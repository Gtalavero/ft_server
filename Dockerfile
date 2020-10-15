FROM    debian:buster

LABEL   maintainer="gtalaverodev@gmail.com"

RUN     apt-get update && apt-get install -y \
        nginx \
        mariadb-server \
		php-fpm php-mysql php-mbstring

#Develop utils
RUN apt-get install -y vim procps curl

# Additional PHP extensions for WordPress
# RUN apt install -y php-curl php-gd php-intl php-mbstring php-soap php-xml php-xmlrpc php-zip

# COPY srcs/* ./tmp/
COPY srcs/init.sh 			/tmp
COPY srcs/nginx-conf		/etc/nginx/sites-available/wordpress
COPY srcs/mysql-conf.sql 	/tmp
COPY srcs/index.html		/var/www/html
COPY srcs/wordpress 		/var/www/html/wordpress
COPY /srcs/wp-config.php	/var/www/html/wordpress/
COPY srcs/phpmyadmin		/var/www/html/phpmyadmin

#EXPOSE 80 443

ENTRYPOINT ./tmp/init.sh