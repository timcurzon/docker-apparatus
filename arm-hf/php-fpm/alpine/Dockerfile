FROM arm32v6/alpine

MAINTAINER Tim Curzon "timcurzon@users.noreply.github.com"

RUN apk add --update \
  ca-certificates tini bash \
  php7 \
  php7-bcmath php7-dom php7-ctype php7-curl php7-fileinfo php7-fpm php7-gd php7-gettext \
  php7-iconv php7-intl php7-json php7-mbstring php7-mcrypt php7-mysqlnd php7-opcache \
  php7-openssl php7-pdo php7-pdo_mysql php7-pdo_pgsql php7-pdo_sqlite php7-phar \
  php7-posix php7-session php7-soap php7-xml php7-xmlreader php7-xmlwriter \
  php7-zip php7-zlib \ 
  curl openssl gettext \
  && rm -rf /var/cache/apk/*

RUN ln -sf /dev/stderr /var/log/php7/error.log

RUN mkdir -p /var/www/html

COPY entrypoint.sh /usr/bin/entrypoint.sh

WORKDIR /var/www/html

EXPOSE 9000

ENTRYPOINT ["entrypoint.sh"]

#CMD ["bash"]

CMD ["/usr/sbin/php-fpm7", "-g", "/var/run/php-fpm7.pid", "--nodaemonize"]
