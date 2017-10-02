FROM arm32v6/alpine:latest 

RUN set -x && \
    apk update && \
    apk upgrade && \
    apk add bash

RUN rm -rf /var/cache/apk/*

CMD sleep 1;/bin/bash
