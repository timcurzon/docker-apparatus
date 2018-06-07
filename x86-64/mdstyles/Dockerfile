FROM node:8-alpine 

RUN apk update \
	&& apk upgrade \
	&& apk add --update bash ca-certificates \
	&& rm -rf /var/cache/apk/*

RUN update-ca-certificates

RUN npm install -g markdown-styles

# CMD sleep 1;bash

ENTRYPOINT ["/usr/local/bin/generate-md", "--input /input", "--output /output"]
