FROM nginx 

MAINTAINER Tim Curzon "timcurzon@users.noreply.github.com"

RUN gpg --keyserver hkp://keyserver.ubuntu.com:80 --recv-key CCD91D6111A06851 \
  && gpg -a --export CCD91D6111A06851 | apt-key add - \
  && echo "deb http://repozytorium.mati75.eu/raspbian jessie-backports main contrib non-free" \
     > /etc/apt/sources.list.d/mati75.list

RUN apt-get update

RUN apt-get install --no-install-recommends --no-install-suggests -y \
  php7.0 php7.0-cli php7.0-fpm php7.0-common \
  php7.0-opcache php7.0-intl php7.0-mbstring php7.0-curl \
  php7.0-gd php7.0-curl php7.0-xml php7.0-json php7.0-mysql \ 
  libfreetype6-dev libjpeg62-turbo-dev libmcrypt-dev libpng12-dev \
  libbz2-dev libxslt-dev libldap2-dev \
  wget curl git unzip imagemagick
  # && apt-get clean \
  # && rm -r /var/lib/apt/lists/*

CMD ["bash"]
