# SETTINGS UP DIRECTORIES
rm /etc/nginx/sites-available/default && rm /etc/nginx/sites-enabled/default
rm /var/www/html/index.nginx-debian.html

#NGINX
ln -s /etc/nginx/sites-available/wordpress /etc/nginx/sites-enabled/

#WORDPRESS
chown -R www-data:www-data /var/www/html/*
chmod -R 755 /var/www/*

#SSL
openssl req -x509 -nodes -days 365 \
	-newkey rsa:2048 -subj "/C=SP/ST=Spain/L=Madrid/O=42/CN=127.0.0.1" \
	-keyout /etc/ssl/private/server.key \
	-out /etc/ssl/certs/server.crt && \
	openssl dhparam -out /etc/nginx/dhparam.pem 1000

#START SERVICES
service mysql start
service nginx start
service php7.3-fpm start
mysql < /tmp/mysql-conf.sql

echo "Ya puedes acceder!!"
echo "*********************************************"
echo "http://localhost"
echo "*********************************************"
bash
