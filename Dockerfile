FROM ubuntu:latest

RUN apt update

RUN apt install -y curl net-tools

RUN curl -Lo /home/xampp.run https://www.apachefriends.org/xampp-files/7.4.7/xampp-linux-x64-7.4.7-0-installer.run

RUN chmod +x /home/xampp.run

RUN /home/xampp.run

WORKDIR /opt/lampp

EXPOSE 80

EXPOSE 3306

ENTRYPOINT /opt/lampp/xampp start && bash