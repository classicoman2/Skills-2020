<?php

require "../ComprobadorDatos.php";
require "BDConector.php";

header("Content-Type: application/json");

$comprobador = new ComprobadorDatos;

if (!$comprobador->comprobarDni($_REQUEST["dni"])) { die("{\"eliminado\": false}"); }

if ($_SERVER["REQUEST_METHOD"] != "DELETE") { die("{\"eliminado\": false}"); }

$query = "delete from personas where dni = '" . $_REQUEST["dni"] . "'";

$db = new BDConector();
if (!$db->abrirConexion()) { die("{\"eliminado\": false}"); }

if ($db->ejecutarQuery($query)) { echo "{\"eliminado\": true}"; }
else { die("{\"eliminado\": false}"); }

$db->cerrarConexion();

?>