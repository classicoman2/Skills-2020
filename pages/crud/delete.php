<?php
    /*if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
        if (!isset($_REQUEST["dni"])) die();
    } else {
        die("El método de la petición debe ser DELETE");
    }

    $conexion = new mysqli("192.168.1.20", "skills", "1234", "skills");
    if ($conexion->connect_error) die("Ha habido un error en la conexión");

    $query = "delete from personas where dni = '" . $_REQUEST["dni"] . "'";

    if ($conexion->query($query) !== TRUE) die("No se ha borrado el registro");

    echo "Borrado";*/

header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    echo "{\"eliminado\": true}";
} else {
    die("{\"eliminado\": false}");
}

//echo $_REQUEST["dni"] . "\n";

?>