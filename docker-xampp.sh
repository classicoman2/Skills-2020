#! /bin/bash

mkdir -p pages

echo '<html><head><meta charset="UTF-8"><title>Documento</title></head><body><h1>Hola mundo</h1></body></html>' > pages/index.html

docker run -dit \
    --name xampp \
    -v ${PWD}/pages:/opt/lampp/htdocs \
    -p 80:80 \
    -p 3306:3306 \
    xampp