FROM ubuntu/nginx:latest

RUN apt-get update -y \ 
&& apt-get install -y python3 certbot python3-certbot-nginx

COPY ./nginx/nginx.conf /etc/nginx/

COPY ./nginx/default /etc/nginx/sites-available/

RUN mkdir -p /var/cache/nginx
RUN mkdir -p /etc/letsencrypt/

RUN chown -R www-data:www-data /var/www/html \
    && chown -R www-data:www-data /var/cache/nginx \
    && chown -R www-data:www-data /var/log/nginx \
    && chown -R www-data:www-data /etc/nginx

ENTRYPOINT [ "nginx", "-g", "daemon off;" ]
