<?php

require "../ComprobadorDatos.php";
require "BDConector.php";

header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] != "PUT") {
    die("{\"actualizado\": false}");
}

$comprobador = new ComprobadorDatos;

$json = file_get_contents('php://input');
$datos = json_decode($json);

if (!$comprobador->comprobarTodo($datos->dni,
                                $datos->nombre,
                                $datos->papellido,
                                $datos->sapellido,
                                $datos->fechanac,
                                $datos->genero,
                                $datos->vivo)) { die("{\"actualizado\": false}"); }

$query = "update personas set nombre = '$datos->nombre', apellido_1 = '$datos->papellido', apellido_2 = '$datos->sapellido',
fecha_de_nac = '$datos->fechanac', genero = '$datos->genero', vivo = $datos->vivo, descripcion = '$datos->descripcion'
where dni = '$datos->dni'";

$db = new BDConector();
if (!$db->abrirConexion()) { die("{\"actualizado\": false}"); }

if ($db->ejecutarQuery($query)) { echo "{\"actualizado\": true}"; }
else { die("{\"actualizado\": false}"); }

$db->cerrarConexion();

?>