<?php

require "BDConector.php";

if ($_SERVER["REQUEST_METHOD"] != "GET") {
    die();
}

header("Content-Type: application/json");
$json = new stdClass();

$db = new BDConector();

if (!$db->abrirConexion()) { die(); }

$query = "select dni, nombre, apellido_1, apellido_2, fecha_de_nac,
genero, vivo, descripcion from personas order by nombre desc";

$resultadoQuery = $db->ejecutarQuery($query);

$db->cerrarConexion();

$json->personas = array();

if ($resultadoQuery) {
    while ($fila = $resultadoQuery->fetch_assoc()) {
        $persona = new stdClass();
        $persona->dni = $fila["dni"];
        $persona->nombre = $fila["nombre"];
        $persona->apellido_1 = $fila["apellido_1"];
        $persona->apellido_2 = $fila["apellido_2"];
        $persona->fecha_de_nac = $fila["fecha_de_nac"];
        if ($fila["genero"] == "F") { $persona->genero = "Mujer"; }
        else { $persona->genero = "Hombre"; }
        if ($fila["vivo"] == 1) { $persona->vivo = "Sí"; }
        else { $persona->vivo = "No"; }
        $persona->descripcion = $fila["descripcion"];
        $json->personas[count($json->personas)] = $persona;
    }
}

echo json_encode($json);

?>