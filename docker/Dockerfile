FROM alpine:3.7

RUN apk add --no-cache \
    nginx \
    php7-fpm \
    php7-mysqli \
    php7-memcached \
    runit

ADD runit /etc/runit
RUN chmod +x /etc/runit/nginx/run && \
    chmod +x /etc/runit/php-fpm/run

ADD nginx/default.conf /etc/nginx/conf.d/default.conf
ADD nginx/nginx.conf /etc/nginx/nginx.conf
ADD php-fpm/test.conf /etc/php7/php-fpm.d/test.conf

EXPOSE 80

ENTRYPOINT ["runsvdir", "/etc/runit"]
