# Build Stage
FROM composer:2.4 AS build

WORKDIR /app
COPY . /app/
RUN composer install --prefer-dist --no-dev --optimize-autoloader --no-interaction --ignore-platform-reqs

# Production Stage
FROM php:8.0-apache-buster as production

# Install dependencies
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libaio1 \
    wget \
    unzip \
    git \
    zip \
    libzip-dev \
    libssl-dev \
    libcurl4-openssl-dev \
    libicu-dev \
    libonig-dev \
    libxml2-dev \
    libxslt1-dev \
    libgmp-dev \
    libbz2-dev \
    libjpeg-dev \
    libpng-dev \
    libfreetype6-dev \
    && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:2.4 /usr/bin/composer /usr/bin/composer

# Download and install Oracle Instant Client and SDK# Install Oracle Instantclient
RUN apt-get update && apt-get install -y libaio1 wget unzip \
&& mkdir /opt/oracle \
&& cd /opt/oracle \
&& wget https://download.oracle.com/otn_software/linux/instantclient/211000/instantclient-basic-linux.x64-21.1.0.0.0.zip \
&& unzip instantclient-basic-linux.x64-21.1.0.0.0.zip \
&& rm -f instantclient-basic-linux.x64-21.1.0.0.0.zip \
&& cd /opt/oracle/instantclient* \
&& rm -f *jdbc* *occi* *mysql* *mql1* *ipc1* *jar uidrvci genezi adrci \
&& echo /opt/oracle/instantclient* > /etc/ld.so.conf.d/oracle-instantclient.conf \
&& ldconfig

# Install and enable OCI8 extension
RUN docker-php-ext-configure oci8 --with-oci8=instantclient,/opt/oracle/instantclient* \
&& docker-php-ext-install oci8

# Install other PHP extensions
RUN docker-php-ext-configure opcache --enable-opcache \
    && docker-php-ext-install pdo pdo_pgsql zip

# Copy application files
COPY --from=build /app /var/www/html
COPY docker/apache/000-default.conf /etc/apache2/sites-available/000-default.conf
COPY .env /var/www/html/.env

# Set the working directory
WORKDIR /var/www/html

# Ensure environment variables are loaded and clear any cached configuration
RUN php artisan config:clear \
    && php artisan config:cache \
    && php artisan cache:clear \
    && php artisan route:cache \
    && mkdir -p storage/logs \
    && chmod -R 775 storage \
    && chmod -R 775 bootstrap/cache \
    && chown -R www-data:www-data storage \
    && chown -R www-data:www-data bootstrap/cache \
    && a2enmod rewrite
# Expose the port Apache is running on
EXPOSE 80
