FROM webdevops/php-nginx:7.4-alpine
# FROM webdevops/php-nginx:7.3-alpine

WORKDIR /app/public

ENV PHP_POST_MAX_SIZE 512M
ENV PHP_UPLOAD_MAX_FILESIZE 256M

COPY ./banner /app
RUN rm /opt/docker/etc/nginx/vhost.common.d/10-location-root.conf
COPY ./banner/location.conf /opt/docker/etc/nginx/vhost.common.d/location.conf
COPY ./banner/nginx-config.conf /opt/docker/etc/nginx/vhost.common.d/nginx-config.conf
RUN echo "memory_limit=-1" > /usr/local/etc/php/conf.d/maxmem.ini