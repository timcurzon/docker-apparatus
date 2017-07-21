FROM arm32v6/alpine

MAINTAINER Tim Curzon "timcurzon@users.noreply.github.com"

RUN apk add --update \
  ca-certificates tini bash nginx \
  && rm -rf /var/cache/apk/*

RUN mkdir -p /var/www/site \
  && rm -rf /var/www/localhost/

COPY entrypoint.sh /usr/bin/entrypoint.sh

EXPOSE 80

ENTRYPOINT ["entrypoint.sh"]

CMD ["/usr/sbin/nginx", "-g", "pid /var/run/nginx.pid; daemon off;"]
