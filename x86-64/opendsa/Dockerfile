FROM debian:stretch-slim

MAINTAINER Tim Curzon "timcurzon@users.noreply.github.com"

RUN apt-get update \
  && apt-get install --no-install-recommends --no-install-suggests -y \
    ca-certificates make git python python-pip \
  && mkdir -p /usr/share/man/man1 \
  && apt-get install --no-install-suggests -y \
    default-jre-headless

RUN pip install setuptools \
  && pip install wheel \
  && pip install sphinx \
  && pip install beautifulsoup4 \
  && pip install hieroglyph

RUN mkdir -p /tmp/build \
  && mkdir -p /tmp/export \
  && cd /tmp/build && git clone git://github.com/OpenDSA/OpenDSA.git \
  && cd /tmp/build/OpenDSA && git submodule init && make pull \
  && cd /tmp/build/OpenDSA/JSAV && git pull https://github.com/vkaravir/JSAV \
  && cd /tmp/build/OpenDSA/QBank && git pull https://github.com/OpenDSA/QBank

RUN cd /tmp/build/OpenDSA && python tools/configure.py config/Everything.json || true

COPY entrypoint.sh /usr/local/bin

EXPOSE 80

STOPSIGNAL sigterm

ENTRYPOINT ["entrypoint.sh"]

CMD ["bash"]
