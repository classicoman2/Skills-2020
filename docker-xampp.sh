#! /bin/bash

mkdir -p pages
mkdir -p etc

echo '<html><head><meta charset="UTF-8"><title>Documento</title></head><body><h1>Hola mundo</h1></body></html>' > pages/index.html

docker run -d \
    --name xampp \
    -v ${PWD}/pages:/opt/lampp/htdocs \
    -v ${PWD}/etc:/opt/lampp/etc \
    -p 80:80 \
    -p 3306:3306 \
    xampp

chown -R ${UID} pages etc