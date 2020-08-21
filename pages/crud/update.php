<?php

header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] != "PUT") {
    die("{\"actualizado\": false}");
}

$json = file_get_contents('php://input');
$datos = json_decode($json);

$query = "update personas set nombre = '$datos->nombre', apellido_1 = '$datos->papellido', apellido_2 = '$datos->sapellido',
fecha_de_nac = '$datos->fechanac', genero = '$datos->genero', vivo = $datos->vivo, descripcion = '$datos->descripcion'
where dni = '$datos->dni'";

$conexion = new mysqli("192.168.1.20", "skills", "1234", "skills");
if ($conexion->connect_error) { die("{\"actualizado\": false}"); }

if ($conexion->query($query)) {echo "{\"actualizado\": true}";}
else { die("{\"actualizado\": false}"); }

$conexion->close();

?>