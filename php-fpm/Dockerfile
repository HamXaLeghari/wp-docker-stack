FROM php:8.1-fpm-alpine

#ENV GD_DEPS="zlib-dev libpng-dev libjpeg-turbo-dev libxpm freetype-dev libwebp"


ENV GD_DEPS="zlib-dev libwebp libxpm gd-dev libpng-dev libjpeg-turbo-dev freetype-dev"

RUN apk update \
        && apk add --no-cache $PHPIZE_DEPS $GD_DEPS libexif-dev shadow \
        && docker-php-ext-install mysqli exif gd \
        && apk del $PHPIZE_DEPS  \ 
        && groupmod -g 33 www-data

COPY ./php-fpm/www.conf /usr/local/etc/php-fpm.d

COPY ./php-fpm/php.ini /usr/local/etc/php/

ENTRYPOINT [ "php-fpm" ]
