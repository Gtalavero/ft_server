FROM    debian:buster

LABEL   maintainer="gtalaverodev@gmail.com"  \
        description="L.E.M.P.(Linux, ~E~Nginx, MySQL, Php) stack with Wordpress, phpMyAdmin and a SQL db"

RUN     apt-get update && apt-get install -y \
        nginx \
        mariadb-server \
		php-fpm \
		php-mysql

COPY srcs/init.sh ./

#EXPOSE 8080

ENTRYPOINT ./init.sh


