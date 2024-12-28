FROM php:8.2-apache

USER www-data:www-data

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN chmod +x /usr/local/bin/install-php-extensions; \
    install-php-extensions mysqli mysqlnd pdo pdo_mysql zip