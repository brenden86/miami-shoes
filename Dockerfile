FROM php:7.3-fpm

# install PDO extension for interacting with database using PDO
RUN docker-php-ext-install pdo pdo_mysql

RUN docker-php-ext-enable pdo pdo_mysql





