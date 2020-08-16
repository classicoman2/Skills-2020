<?php

header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] != "GET") {
    die();
}

if (!isset($_GET["dni"]) || $_GET["dni"] == "") {
    die();
}

$persona = new stdClass();

$persona = new stdClass();
$persona->dni = $_GET["dni"];
$persona->nombre = "Jose Maria";
$persona->apellido_1 = "Samos";
$persona->apellido_2 = "Diago";
$persona->fecha_de_nac = "26-11-2000";
$persona->genero = "Hombre";
$persona->vivo = "Sí";
$persona->descripcion = "Yo mismo";

echo json_encode($persona);

?>