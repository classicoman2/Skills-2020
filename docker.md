# Hacer uso del dockerfile

Para iniciar el contenedor xampp la primera vez debemos ejecutar el script [docker-xampp.sh](docker-xampp.sh), para ello seguimos estos pasos:

```bash
chmod +x docker-xampp.sh
./docker-xampp.sh
```

Esto nos creará un contenedor que escuchará por el puerto 80, si accedemos a [http://localhost](http://localhost) veremos el documento de prueba.

Para acceder a phpmyadmin para la base de datos vamos al enlace [http://localhost/phpmyadmin](http://localhost/phpmyadmin).

> Si sale un error "Nuevo concepto de seguridad" tendremos que ejecutar los siguientes comandos para habilitar phpmyadmin desde todos los hosts
>
> ```bash
> docker exec -it xampp bash
> cd /opt/lampp/etc/extra
> apt install nano
> nano httpd-xampp.conf
> ```
>
> Y cambiar la línea que pone `Require local` por `Require all granted`
>
>> Si el contenedor es borrado habrá que modificar de nuevo este fichero ya que ningún volumen apunta hacia él.

Para detener el contenedor ejecutamos `docker stop xampp` y para volverlo a encender `docker start xampp`.

En la carpeta pages es donde deben ir todos los recursos de la web (html, imagenes, css, javascript, php, etc...)