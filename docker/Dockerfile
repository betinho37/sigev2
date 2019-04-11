FROM ubuntu:16.04

EXPOSE 80:80

ENV DEBIAN_FRONTEND noninteractive

RUN apt-get update

RUN echo 'mysql-server mysql-server/root_password password root' | debconf-set-selections
RUN echo 'mysql-server mysql-server/root_password_again password root' | debconf-set-selections

RUN apt-get -y install apache2 php7.0 mysql-server subversion php7.0-mysql libapache2-mod-php7.0

RUN svn co http://svn.toqsolucoes.com.br/sigetoq/ --username luiz --password luiz /var/www/html/sigetoq

RUN service mysql start; until mysql -u root -p'root' -e 'select 1 + 1 as dois;'; do echo "Aguardando o MYSQL"; sleep 5; done;  mysql -u root -p'root' -e 'CREATE DATABASE sige'; cd /var/www/html/sigetoq; php artisan config:cache; php artisan migrate; a2enmod rewrite

ADD 000-default.conf /etc/apache2/sites-available/000-default.conf

ENTRYPOINT chmod -R 777 /var/www/html/sigetoq; service mysql start && service apache2 restart && bash

