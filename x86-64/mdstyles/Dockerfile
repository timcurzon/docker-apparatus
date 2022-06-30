FROM node:16-alpine 

RUN apk update \
	&& apk upgrade \
	&& apk add --update bash ca-certificates \
	&& rm -rf /var/cache/apk/*

RUN update-ca-certificates

RUN npm install -g markdown-styles

COPY init.sh /mdstyles/init.sh

WORKDIR /workdir

ENTRYPOINT ["/mdstyles/init.sh"] 
