<?php

    if ($_SERVER["REQUEST_METHOD"] != "GET") {
        die();
    }

    header("Content-Type: application/json");
    $json = new stdClass();

    /*$conexion = new mysqli("192.168.1.20", "skills", "1234", "skills");

    if ($conexion->connect_error) { $json->conexion = "failed"; }
    else { $json->conexion = "succes"; }

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
            $persona->genero = $fila["genero"];
            $persona->vivo = $fila["vivo"];
            $persona->descripcion = $fila["descripcion"];
            $json->personas[count($json->personas)] = $persona;
        }
    }

    $conexion->close();*/

    $persona = new stdClass();
    $persona->dni = "12345678G";
    $persona->nombre = "Yaiza";
    $persona->apellido_1 = "Pascual";
    $persona->apellido_2 = "Montfort";
    $persona->fecha_de_nac = "27-12-1998";
    $persona->genero = "Mujer";
    $persona->vivo = "Sí";
    $persona->descripcion = "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusamus delectus excepturi, quod mollitia ducimus voluptates illum debitis consectetur praesentium eius.";
    $json->personas[0] = $persona;

    $persona2 = new stdClass();
    $persona2->dni = "87654321H";
    $persona2->nombre = "Manolo";
    $persona2->apellido_1 = "Torres";
    $persona2->apellido_2 = "Martínez";
    $persona2->fecha_de_nac = "19-03-1990";
    $persona2->genero = "Hombre";
    $persona2->vivo = "Sí";
    $persona2->descripcion = "Persona que no existe y me acabo de inventar para rellenar.";
    $json->personas[1] = $persona2;

    echo json_encode($json);

?>