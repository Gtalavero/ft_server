docker rm -f s_cont && docker build --tag s_image /home/gtalaver/ft_server && docker run -it --name s_cont s_image:latest sh
