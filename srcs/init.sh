# SETTINGS UP DIRECTORIES
rm -rf /var/www/html
rm /etc/nginx/sites-available/default && rm /etc/nginx/sites-enabled/default
mkdir /var/www/wordpress

#NGINX
mv /tmp/nginx-conf /etc/nginx/sites-available/wordpress
ln -s /etc/nginx/sites-available/wordpress /etc/nginx/sites-enabled/

#WORDPRESS
# tar -xzvf /var/www/wordpress-5.5.1-es_ES.tar.gz
# rm /var/www/wordpress-5.5.1-es_ES.tar.gz
# cp /tmp/wp-config.php /var/www/wordpress/
chown -R www-data:www-data /var/www/*
chmod -R 755 /var/www/*

# # Test file
# echo "<html>
# 	Best site ever
# </html>" >> /var/www/wordpress/index.html

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

echo "Open localhost wordpress and create wpadmin user"
echo "*********************************************"
echo "http://localhost:8080/wordpress/wp-admin/install.php"
echo "*********************************************"

bash
