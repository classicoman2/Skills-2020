<?php

require "BDConector.php";

header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] != "GET") {
    die();
}

if (!isset($_GET["dni"]) || $_GET["dni"] == "") {
    die();
}

$db = new BDConector();

if (!$db->abrirConexion()) { die(); }

$query = "select dni, nombre, apellido_1, apellido_2, fecha_de_nac,
genero, vivo, descripcion from personas where dni = '" . $_GET["dni"] . "';";

$resultadoQuery = $db->ejecutarQuery($query);

$db->cerrarConexion();

if (!$resultadoQuery) { die("{\"encontrado\": 0}"); }

$persona = $resultadoQuery->fetch_assoc();

if ($persona["genero"] == "F") { $persona["genero"] = "Mujer"; }
else { $persona["genero"] = "Hombre"; }

if ($persona["vivo"] == 1) { $persona["vivo"] = "Sí"; }
else { $persona["vivo"] = "No"; }

$persona["encontrado"] = 1;

echo json_encode($persona);

?>