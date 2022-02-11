FROM php:7.4-fpm-alpine

RUN docker-php-ext-install pdo_mysql

RUN apk update && apk add php7-dev g++ make

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN chown -R www-data:www-data /var/www
RUN chmod 755 /var/www
