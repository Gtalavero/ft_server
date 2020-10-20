# Aim of the proyect
[42 school][1] project about use `Docker` to install a complete web server which will run multiples services: `Wordpress`, `phpMyAdmin` and a `SQL` Database.

# HOW TO RUN
1. Clone

2. Build the image (inside the directory)
    docker build --tag lemp_img .

3. Run the container
    docker run -p 80:80 -p 443:443 -it lemp_img

4. Go to http://localhost

## Instructions
- Place all the necessary files for the configuration in a `src` folder, incluing Wordpress files.
- Dockerfile file should be at the root of the repository.
- Set up the web server with Nginx in only one docker container. Container OS must be Debian Buster.
- Server must be able to run several services (Wordpress website, phpMyAdmin and MySQL) at the same time.
- The SQL db should works with de WordPress and phpMyAdmin.
- Server should be able to use `SSL` protocol.
- Depending on the URL, the server should redirects to the correct website.
- Server should run with an autoindex that must be able to be disabled.
- Don't use Docker Compose

## Documentation and utils
### **Docker**
---
Platform to build, run and share applications with containers. 
[Official documentation][2]
#### **Docker architecture**
![architecture image](https://www.imaginaformacion.com/wp-content/uploads/2018/11/img10-768x401.png)

### **Docker**
My [Notion][3] about the proyect step by step.

[1]: https://www.42madrid.com/
[2]: https://docs.docker.com/
[3]: https://www.notion.so/gtalaverodev/LEMP-STACK-Wordpress-Debian-10-on-Docker-8461bcc407824e57994c92b2a148716d
