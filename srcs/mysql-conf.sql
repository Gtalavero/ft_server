-- Generate DB 'wordpressdb';
CREATE DATABASE wordpressdb DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

--Generate user 'wpuser' with 'wppass' password
GRANT ALL ON wordpressdb.* TO 'wpuser'@'localhost' IDENTIFIED BY 'ml0978HJB';

--Refresh privileges
FLUSH privileges;
