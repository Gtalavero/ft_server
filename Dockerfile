# Dockerfile reference: https://docs.docker.com/engine/reference/builder/#run

# Creates the image from a official image
FROM    debian:buster

# Add info to the metadata. You can see with "docker image inspect <image>"
LABEL   maintainer="gtalaverodev@gmail.com"  \
        description="L.E.M.P.(Linux, ~E~Nginx, MySQL, Php) stack with Wordpress, phpMyAdmin and a SQL db"

# # Set the working directory. 
# WORKDIR /home

# Run the command inside your image filesystem.
RUN     apt-get update && apt-get install -y \
        nginx \
        mariadb-server \
	php-fpm \
	php-mysql

# Copy from "srcs" to actual location (Workdir)
COPY srcs/* ./

# Add metadata to the image to describe which port the container is listening on at runtime.
EXPOSE 8080

# Run the specified command within the container. Provide defaults for an executing container
# CMD service nginx start && \
# service mysql start
CMD bash ./init.sh


