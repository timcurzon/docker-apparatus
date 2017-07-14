FROM debian:stretch-slim

MAINTAINER Tim Curzon "timcurzon@users.noreply.github.com"

RUN apt-get update \
  && apt-get install --no-install-recommends --no-install-suggests -y \
    ca-certificates make git python python-pip \
  && for COUNT in `seq 1 9`; do mkdir -p /usr/share/man/man$COUNT; done \
  && apt-get install --no-install-suggests -y \
    default-jre-headless

RUN pip install setuptools \
  && pip install wheel \
  && pip install sphinx \
  && pip install beautifulsoup4

RUN cd tmp \
  && git clone git://github.com/OpenDSA/OpenDSA.git \
  && cd /tmp/OpenDSA && git submodule init && make pull \
  && cd /tmp/OpenDSA/JSAV && git pull https://github.com/vkaravir/JSAV \
  && cd /tmp/OpenDSA/QBank && git pull https://github.com/OpenDSA/QBank

#RUN cd /tmp/OpenDSA && python tools/configure.py config/Everything.json

COPY entrypoint.sh /usr/local/bin

EXPOSE 80

STOPSIGNAL sigterm

ENTRYPOINT ["entrypoint.sh"]

CMD ["bash"]
