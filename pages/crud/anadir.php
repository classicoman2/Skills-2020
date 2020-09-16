<?php

require "../ComprobadorDatos.php";
require "BDConector.php";

$json = file_get_contents('php://input');

$datos = json_decode($json);

header("Content-Type: application/json");

$comprobador = new ComprobadorDatos;

if (!$comprobador->comprobarTodo($datos->dni,
                                $datos->nombre,
                                $datos->papellido,
                                $datos->sapellido,
                                $datos->fechanac,
                                $datos->genero,
                                $datos->vivo)) { die("{\"anadido\": false}"); }

$query = "insert into personas (dni, nombre, apellido_1, apellido_2, fecha_de_nac, genero, vivo, descripcion)
values ('$datos->dni', '$datos->nombre', '$datos->papellido', '$datos->sapellido', '$datos->fechanac', '$datos->genero',
$datos->vivo, '$datos->descripcion')";

$db = new BDConector();
if (!$db->abrirConexion()) { die("{\"anadido\": false}"); }

if ($db->ejecutarQuery($query)) { echo "{\"anadido\": true}"; }
else { echo "{\"anadido\": false}"; }

$db->cerrarConexion();

?>