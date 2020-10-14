FROM    debian:buster

LABEL   maintainer="gtalaverodev@gmail.com"  \
        description="L.E.M.P.(Linux, ~E~Nginx, MySQL, Php) stack with Wordpress, phpMyAdmin and a SQL db"

RUN     apt-get update && apt-get install -y \
        nginx \
        mariadb-server \
		php-fpm \
		php-mysql \
		php-mbstring

#Develop utils
RUN apt-get install -y \
	vim \
	procps \
	curl

#Additional PHP extensions for WordPress
#RUN apt install -y php-curl php-gd php-intl php-mbstring php-soap php-xml php-xmlrpc php-zip

COPY srcs/* ./tmp/

#ADD https://es.wordpress.org/wordpress-5.5.1-es_ES.tar.gz /var/www/

#EXPOSE 80 443

ENTRYPOINT ./tmp/init.sh


