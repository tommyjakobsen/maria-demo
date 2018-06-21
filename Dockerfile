FROM alpine:edge

ENV TERM xterm

RUN echo "http://dl-cdn.alpinelinux.org/alpine/edge/testing" >> /etc/apk/repositories && \ 
    apk update && \ 
    apk upgrade && \ 
    apk add --update \ 
    php7-mcrypt \ 
    php7-soap \ 
    php7-openssl \ 
    php7-gmp \ 
#    php7-pdo_odbc \ 
    php7-json \ 
    php7-dom \ 
    php7-pdo \ 
    php7-zip \ 
    php7-mysqli \ 
#    php7-sqlite3 \ 
#    php7-pdo_pgsql \ 
    php7-bcmath \ 
    php7-gd \ 
#    php7-odbc \ 
    php7-pdo_mysql \ 
#    php7-pdo_sqlite \ 
    php7-gettext \ 
    php7-xmlreader \ 
    php7-xmlrpc \ 
    php7-bz2 \ 
    php7-iconv \ 
#    php7-pdo_dblib \ 
    php7-curl \
    php7-session \
    php7-fpm \
    php7-ctype 
    
RUN apk add git  bash nginx ca-certificates && \
  apk add -u musl && \
  mkdir -p /etc/nginx/conf.d
 
RUN git clone https://github.com/tommyjakobsen/maria-demo.git /data/htdocks/maria
ADD https://raw.githubusercontent.com/cutec-chris/docker-alpine-php-mysql/master/files/nginx.conf /etc/nginx/
ADD https://raw.githubusercontent.com/cutec-chris/docker-alpine-php-mysql/master/files/php-fpm.conf /etc/php/
ADD https://raw.githubusercontent.com/cutec-chris/docker-alpine-php-mysql/master/files/default.conf /etc/nginx/conf.d/
ADD https://raw.githubusercontent.com/tommyjakobsen/maria-demo/master/run.sh .
RUN chmod +x ./run.sh
RUN ./run.sh

EXPOSE 80
WORKDIR /data/htdocs

VOLUME ["/data/htdocs", "/data/logs", "/var/lib/mysql"]
#CMD ["/run.sh"]
