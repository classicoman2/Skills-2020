<?php

header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] != "GET") {
    die();
}

if (!isset($_GET["dni"]) || $_GET["dni"] == "") {
    die();
}

$conexion = new mysqli("192.168.1.20", "skills", "1234", "skills");

if ($conexion->connect_error) { die(); }

$query = "select dni, nombre, apellido_1, apellido_2, fecha_de_nac,
genero, vivo, descripcion from personas where dni = '" . $_GET["dni"] . "';";

$resultadoQuery = $conexion->query($query);

$conexion->close();

if ($resultadoQuery->num_rows == 0) { die("{\"encontrado\": 0}"); }

$persona = $resultadoQuery->fetch_assoc();

if ($persona["genero"] == "F") { $persona["genero"] = "Mujer"; }
else { $persona["genero"] = "Hombre"; }

if ($persona["vivo"] == 1) { $persona["vivo"] = "Sí"; }
else { $persona["vivo"] = "No"; }

$persona["encontrado"] = 1;

echo json_encode($persona);

?>