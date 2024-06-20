FROM ubuntu/apache2

RUN chown -R www-data:www-data /var/www/html \
    && chown -R www-data:www-data /etc/apache2 \
    && chown -R www-data:www-data /var/log/apache2

COPY ./apache2/000-default.conf /etc/apache2/sites-available

COPY ./apache2/apache2.conf /etc/apache2/

RUN a2enmod rewrite ssl proxy proxy_fcgi

ENTRYPOINT ["apache2ctl", "-D", "FOREGROUND"]
