docker rm -f s_cont && docker image rm s_image && docker build --tag s_image /home/$USER/ft_server && docker run -it --name s_cont s_image:latest bash
