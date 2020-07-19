<?php

    header("Content-Type: application/json");
    $json = new stdClass();

    $conexion = new mysqli("192.168.1.20", "skills", "1234", "skills");

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

    $conexion->close();

    echo json_encode($json);

?>