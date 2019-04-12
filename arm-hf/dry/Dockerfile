FROM arm32v6/alpine:latest 

RUN set -x && \
    apk update && \
    apk upgrade && \
    apk add curl file && \
    rm -rf /var/cache/apk/*

# Fix for arm CPU detection
RUN curl https://moncho.github.io/dry/dryup.sh > dryup.sh && \ 
    sed 's|print substr($0,0,4|print substr($0,0,3|' -i dryup.sh && \
    sh dryup.sh && \
    chmod 755 /usr/local/bin/dry

CMD sleep 1;/usr/local/bin/dry
