<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Personas</title>
</head>
<body>
    <?php
        $servername = "192.168.1.20";
        $username = "skills";
        $password = "1234";
        $database = "skills";
        
        // Crear conexión
        $conn = new mysqli($servername, $username, $password, $database);
        
        // Comprobar conexión
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        } else {
            echo "<h1>Correctamente conectado a la base de datos</h1>";
        }

        // Sentencia SQL
        $sql = "select dni, nombre, apellido_1, apellido_2, fecha_de_nac,
        genero, vivo, descripcion from personas order by apellido_1 asc";

        $resultadoQuery = $conn->query($sql);
    ?>

        <table>
            <thead>
                <tr>
                    <th>DNI</th>
                    <th>Nombre</th>
                    <th>Primer apellido</th>
                    <th>Segundo apellido</th>
                    <th>Fecha de nacimiento</th>
                    <th>Genero</th>
                    <th>Vivo</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if ($resultadoQuery->num_rows > 0) {
                        // Rellenar la tabla
                        while ($fila = $resultadoQuery->fetch_assoc()) {
                            echo "<tr>";
                                echo "<td>";
                                    echo $fila["dni"];
                                echo "</td>";
                                echo "<td>";
                                    echo $fila["nombre"];
                                echo "</td>";
                                echo "<td>";
                                    echo $fila["apellido_1"];
                                echo "</td>";
                                echo "<td>";
                                    echo $fila["apellido_2"];
                                echo "</td>";
                                echo "<td>";
                                    echo $fila["fecha_de_nac"];
                                echo "</td>";
                                echo "<td>";
                                    if ($fila["genero"] == "H") {
                                        echo "Hombre: " . $fila["genero"];
                                    } else {
                                        echo "Mujer: " . $fila["genero"];
                                    }
                                    
                                echo "</td>";
                                echo "<td>";
                                    if ($fila["vivo"] == 1) {
                                        echo "Vivo";
                                    } else {
                                        echo "Muerto";
                                    }
                                echo "</td>";
                                echo "<td>";
                                    echo $fila["descripcion"];
                                echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr>Sin resultados</tr>";
                    }
                ?>
            </tbody>
        </table>

    <?php
    //Cerrar conexióm
        $conn->close();
    ?>
</body>
</html>