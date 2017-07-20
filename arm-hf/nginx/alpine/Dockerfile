FROM arm32v6/alpine

MAINTAINER Tim Curzon "timcurzon@users.noreply.github.com"

RUN apk add --update \
  ca-certificates tini bash nginx \
  && rm -rf /var/cache/apk/*

COPY entrypoint.sh /usr/bin/entrypoint.sh

EXPOSE 80

ENTRYPOINT ["entrypoint.sh"]

CMD ["/usr/sbin/nginx", "-g", "pid /var/run/nginx.pid; daemon off;"]
