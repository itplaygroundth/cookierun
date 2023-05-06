FROM webdevops/php-nginx:7.4-alpine
# FROM webdevops/php-nginx:7.3-alpine

WORKDIR /app

ENV PHP_POST_MAX_SIZE 512M
ENV PHP_UPLOAD_MAX_FILESIZE 256M

COPY ./src /app
RUN rm /opt/docker/etc/nginx/vhost.common.d/10-location-root.conf
COPY ./src/location.conf /opt/docker/etc/nginx/vhost.common.d/location.conf
COPY ./src/nginx-config.conf /opt/docker/etc/nginx/vhost.common.d/nginx-config.conf
RUN echo "memory_limit=-1" > /usr/local/etc/php/conf.d/maxmem.ini