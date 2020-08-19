<?php

$json = file_get_contents('php://input');

$datos = json_decode($json);

if ($datos->vivo == "on") { $datos->vivo = 1; }
else { $datos->vivo = 0; }

$query = "insert into personas (dni, nombre, apellido_1, apellido_2, fecha_de_nac, genero, vivo, descripcion)
values ('$datos->dni', '$datos->nombre', '$datos->papellido', '$datos->sapellido', '$datos->fechanac', '$datos->genero',
$datos->vivo, '$datos->descripcion')";

header("Content-Type: application/json");

$conexion = new mysqli("192.168.1.20", "skills", "1234", "skills");
if ($conexion->connect_error) { die("{\"anadido\": false}"); }

if ($conexion->query($query) === TRUE) { echo "{\"anadido\": true}"; }
else { echo "{\"anadido\": false}"; }
$conexion->close();

?>