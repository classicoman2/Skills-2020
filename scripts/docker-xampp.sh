#! /bin/bash

mkdir -p pages
mkdir -p etc

docker run -d \
    --name xampp \
    -v ${PWD}/pages:/opt/lampp/htdocs \
    -v ${PWD}/etc:/opt/lampp/etc \
    -p 80:80 \
    -p 3306:3306 \
    xampp

chown -R ${UID} pages etc