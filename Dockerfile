FROM ubuntu:latest

ADD scripts/installer.sh /home/installer.sh

ADD scripts/start.sh /home/start.sh

RUN chmod +x /home/installer.sh /home/start.sh

EXPOSE 80

EXPOSE 3306

WORKDIR /opt/lampp

ENTRYPOINT /home/start.sh