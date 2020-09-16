# Hacer uso del dockerfile

## Crear la imagen docker

Para crear la imagen docker de xampp debemos ejecutar este comando estando en el mismo directorio que el fichero Dockerfile:

```bash
docker build -t xampp .
```

> Es importante añadir el punto al final

## Iniciar el contenedor

Para iniciar el contenedor xampp la primera vez debemos ejecutar el script [../scripts/docker-xampp.sh](docker-xampp.sh), para ello seguimos estos pasos:

```bash
chmod +x docker-xampp.sh
./scripts/docker-xampp.sh
```

> Es normal que tarde en instalarse xampp, para ver el estado de la instalación ejecutamos `docker logs -f xampp` y veremos los logs que produce el contenedor, para salir ctrl+C.

Esto nos creará un contenedor que escuchará por el puerto 80, si accedemos a [http://localhost](http://localhost) veremos el documento de inicio de xampp.

Para acceder a phpmyadmin para la base de datos vamos al enlace [http://localhost/phpmyadmin](http://localhost/phpmyadmin).

> Si sale un error "Nuevo concepto de seguridad" tendremos que modificar el fichero etc/extra/httpd-xampp.conf y cambiar la línea que pone `Require local` por `Require all granted`

Para detener el contenedor ejecutamos `docker stop xampp` y para volverlo a encender `docker start xampp`.

En la carpeta pages es donde deben ir todos los recursos de la web (html, imagenes, css, javascript, php, etc...)

La carpeta etc contiene los ficheros de configuración de xampp.

Si borramos el contenedor en vez de pararlo tendremos que volver a ejecutar el script [../scripts/docker-xampp.sh](docker-xampp.sh).