FROM kstaken/apache2

MAINTAINER Tommy Jakobsen version: 0.1

RUN apt-get update && apt-get install -y php5 libapache2-mod-php5 php5-mysql php5-cli && apt-get clean && rm -rf /var/lib/apt/lists/*


CMD ["/usr/sbin/apache2", "-D", "FOREGROUND"] 
