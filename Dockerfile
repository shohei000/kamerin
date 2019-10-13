FROM centos:7
LABEL maintainer "daneizumi"

#util
RUN yum -y install git vim

# install apache2.4
RUN yum -y install httpd

# install php7
RUN yum -y install epel-release
RUN rpm -Uvh http://rpms.famillecollet.com/enterprise/remi-release-7.rpm
RUN yum -y --enablerepo=epel install libmcrypt
RUN yum remove php-*
RUN yum -y --enablerepo=remi-php71 install -y php php-cli php-devel php-common php-mbstring php-mysql php-fpm php-gd php-mcrypt php-opcache php-pdo php-xml

# install other modules
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer

ADD docker/httpd.conf /etc/httpd/conf/httpd.conf
ADD docker/php.ini /etc/php.ini


# enable service.
RUN systemctl enable httpd.service

# exec.
CMD ["/sbin/init"]
