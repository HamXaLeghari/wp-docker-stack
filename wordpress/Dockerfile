
FROM alpine:latest

RUN apk update && apk add shadow

RUN groupmod -g 33 www-data

RUN mkdir -p /var/www/html

WORKDIR /var/www/html 

COPY ./wordpress/latest.tar.gz .

#COPY --chown=www-data:www-data ./wordpress/wordpress/ .

RUN tar -xzf latest.tar.gz \
    && rm latest.tar.gz

COPY ./wordpress/wp-config.php ./wordpress 

COPY ./wordpress/.htaccess ./wordpress

RUN chown -R :www-data /var/www/html/wordpress \
 && chmod -R g+rw /var/www/html/wordpress

CMD ["tail", "-f", "/dev/null"]

