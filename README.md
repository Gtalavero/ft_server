# Aim of the proyect
[42 school][1] project about use `Docker` to install a complete web server which will run multiples services: `Wordpress`, `phpMyAdmin` and a `SQL` Database.

## Instructions
- Place all the necessary files for the configuration in a `src` folder, incluing Wordpress files.
- Dockerfile file should be at the root of the repository.
- Set up the web server with Nginx in only one docker container. Container OS must be Debian Buster.
- Server must be able to run several services (Wordpress website, phpMyAdmin and MySQL) at the same time.
- The SQL db should works with de WordPress and phpMyAdmin.
- Server should be able to use `SSL` protocol.
- Depending on the URL, the server should redirects to the correct website.
- Server should run with an autoindex that must be able to be disabled.

## Techie concepts, documentation and utils
### **[Docker][2]**: Platform to build, run and share applications with containers.
* Docker architecture: client-server architecture.

![arch image2](https://www.imaginaformacion.com/wp-content/uploads/2018/11/img5.png)
![architecture image](https://www.imaginaformacion.com/wp-content/uploads/2018/11/img10-768x401.png)
    * Client docker CLI: (docker command) talks to the daemon using a REST API.
    * API REST: specifies the interfaces that programs can use to communicate with the daemon and tell it what to do.
    * Server docker daemon (dockerd): listens for Docker API request and manages `Docker objects`.
    * Docker repository: Stores docker images. They can be public or private. Docker Hub and Docker Cloud are public repositories. When you use `docker pull` or `docker run` the necessary images are extracted from the configured registry (Docker Hub by default).

**[Container][3]**: Software that packages up code and all its dependencies so the application runs quickly and reliably in differents environment.

**LEMP stack**: Software package  variation of LAMP (Linux, Apache, MySQLP, PHP). In LEMP, Apache is replaced with the lightweight yet powerfull Ngynx.
**[Ngynx][4]**: HTTP and reverse proxy server, a mail proxy server, and a generic TCP/UDP proxy server

[1]: https://www.42madrid.com/
[2]: https://docs.docker.com/
[3]: https://www.docker.com/resources/what-container
[4]: http://nginx.org/en/
