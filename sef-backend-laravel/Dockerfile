FROM composer:2.4 as build
COPY . /app/
RUN composer install --prefer-dist --no-dev --optimize-autoloader --no-interaction --ignore-platform-reqs

FROM php:8.1-apache-buster as production

ENV APP_ENV=production
ENV APP_DEBUG=true

RUN docker-php-ext-configure opcache --enable-opcache && \
    docker-php-ext-install pdo

RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pdo_pgsql

COPY docker/php/conf.d/opcache.ini /usr/local/etc/php/conf.d/opcache.ini

COPY --from=build /app /var/www/html
COPY docker/apache/000-default.conf /etc/apache2/sites-available/000-default.conf
COPY .env /var/www/html/.env

RUN php artisan config:cache && \
    php artisan cache:clear && \
    php artisan route:cache && \
    chmod 755 -R /var/www/html/storage/ && \
    chmod 755 -R /var/www/html/vendor/ && \
    chown -R www-data:www-data /var/www/ && \
    a2enmod rewrite