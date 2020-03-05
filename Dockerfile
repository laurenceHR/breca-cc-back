#
# PHP Dependencies
#
FROM composer:1.7 as vendor

RUN php --version
RUN composer -h

COPY database/ database/
COPY composer.json composer.json
COPY composer.lock composer.lock

WORKDIR /app

RUN composer install \
    --ignore-platform-reqs \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --prefer-dist


#
# Application
#
FROM php:7.2-apache-stretch
RUN docker-php-ext-install mysqli pdo pdo_mysql

WORKDIR /app
ADD . /app

COPY --from=vendor /app/vendor /app/vendor

RUN cd app

RUN ls -l

RUN php artisan key:generate
RUN php artisan clear-compiled
RUN php artisan view:clear

EXPOSE 8000
CMD php artisan serve --host=0.0.0.0 --port=8000
