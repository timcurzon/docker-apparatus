FROM resin/rpi-raspbian

MAINTAINER Tim Curzon "timcurzon@users.noreply.github.com"

RUN apt-get update \
  && apt-get install --no-install-recommends --no-install-suggests -y \
    ca-certificates gnupg nginx-extras \
  && apt-get clean \
  && rm -r /var/lib/apt/lists/*

RUN ln -sf /dev/stdout /var/log/nginx/access.log \
  && ln -sf /dev/stderr /var/log/nginx/error.log

EXPOSE 80

STOPSIGNAL SIGTERM

CMD ["/usr/sbin/nginx", "-g", "daemon off;"]
