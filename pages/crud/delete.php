<?php

header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] != "DELETE") { die("{\"eliminado\": false}"); }

$conexion = new mysqli("192.168.1.20", "skills", "1234", "skills");
if ($conexion->connect_error) { die("{\"eliminado\": false}"); }

$query = "delete from personas where dni = '" . $_REQUEST["dni"] . "'";

if ($conexion->query($query) === TRUE) { echo "{\"eliminado\": true}"; }
else { die("{\"eliminado\": \"$conexion->error\"}"); }

$conexion->close();

?>