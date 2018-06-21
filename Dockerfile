FROM php

MAINTAINER Tommy Jakobsen version: 0.1
RUN apt-get update && apt-get install -y git php5 libapache2-mod-php5 php5-mysql php5-cli && apt-get clean && rm -rf /var/lib/apt/lists/*
#RUN apt-get install -y git
RUN git clone https://github.com/tommyjakobsen/maria-demo.git
CMD ["/usr/sbin/apache2", "-D", "FOREGROUND"] 
