--Generate DB 'wordpressdb';
CREATE DATABASE wordpressdb DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

--Generate user 'wpuser' with 'wppass' password
CREATE USER 'wpuser'@'localhost' IDENTIFIED BY 'ml0978HJB';

--Give permissions for wpuser to wordpressdb
GRANT ALL ON wordpressdb.* TO 'wpuser'@'localhost';

--Refresh privileges
FLUSH privileges;
