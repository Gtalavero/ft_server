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
**[Docker][2]**: Platform to build, run and share applications with containers.
**[Container][3]**: Software that packages up code and all its dependencies so the application runs quickly and reliably in differents environment.

[1]: https://www.42madrid.com/
[2]: https://docs.docker.com/
[3]: https://www.docker.com/resources/what-container
