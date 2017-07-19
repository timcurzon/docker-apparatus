FROM resin/rpi-raspbian 

MAINTAINER Tim Curzon "timcurzon@users.noreply.github.com"

RUN apt-get update \
  && apt-get install --no-install-suggests -y \
    ca-certificates ssl-cert git openssl nginx wget vim bzip2

RUN apt-get install --no-install-suggests -y \
    libapr1 libtool libcurl4-openssl-dev \
    sqlite3 memcached varnish curl \
    php5 php5-dev php5-cli php5-cgi php5-fpm php5-common php-pear \
    php-apc php-xml-parser php5-curl php5-gd php5-memcache php5-sqlite

# WORKDIR ...

# COPY entrypoint.sh /usr/local/bin

# EXPOSE 80

# STOPSIGNAL sigterm

# ENTRYPOINT ["entrypoint.sh"]

CMD ["bash"]
