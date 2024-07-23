CREATE USER postgres with encrypted password '';
CREATE DATABASE hips_db;
GRANT ALL PRIVILEGES ON DATABASE postgres TO postgres;