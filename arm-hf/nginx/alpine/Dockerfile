FROM arm32v6/alpine

MAINTAINER Tim Curzon "timcurzon@users.noreply.github.com"

RUN apk add --update \
  ca-certificates tini bash nginx \
  && rm -rf /var/cache/apk/*

RUN ln -sf /dev/stdout /var/log/nginx/access.log \
  && ln -sf /dev/stderr /var/log/nginx/error.log

RUN mkdir -p /var/www/html \
  && rm -rf /var/www/localhost/

COPY entrypoint.sh /usr/bin/entrypoint.sh

EXPOSE 80

ENTRYPOINT ["entrypoint.sh"]

CMD ["/usr/sbin/nginx", "-g", "pid /var/run/nginx.pid; daemon off;"]
