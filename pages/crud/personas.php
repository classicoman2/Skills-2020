<?php

if ($_SERVER["REQUEST_METHOD"] != "GET") {
    die();
}

header("Content-Type: application/json");
$json = new stdClass();

$conexion = new mysqli("192.168.1.20", "skills", "1234", "skills");

if ($conexion->connect_error) { die(); }

$query = "select dni, nombre, apellido_1, apellido_2, fecha_de_nac,
genero, vivo, descripcion from personas order by apellido_1 asc";

$resultadoQuery = $conexion->query($query);

$json->personas = array();

if ($resultadoQuery->num_rows > 0) {
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

$conexion->close();

echo json_encode($json);

?>