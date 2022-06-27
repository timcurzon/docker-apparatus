FROM alpine:3.16

RUN set -x && \
    apk update && \
    apk upgrade && \
    apk add curl file && \
    rm -rf /var/cache/apk/*

RUN curl https://moncho.github.io/dry/dryup.sh > dryup.sh && \ 
    sh dryup.sh && \
    chmod 755 /usr/local/bin/dry

CMD sleep 1;/usr/local/bin/dry
