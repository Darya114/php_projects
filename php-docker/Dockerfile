FROM php:8.2-apache

RUN docker-php-ext-install pdo pdo_mysql

WORKDIR /var/www/html/app

COPY ./app ./ 

RUN sed -i 's!/var/www/html!/var/www/html/app!g' /etc/apache2/sites-available/000-default.conf

EXPOSE 80
