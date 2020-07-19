<style>
p {
    font-weight: bold;
    font-size: large;
}
</style>
<?php
    echo "<h1>Se añadirá la siguiente persona:</h1>";
    
    echo "<p>DNI:</p>";
    echo $_POST["dniPersona"];
    echo "<p>Nombre:</p>";
    echo $_POST["nombrePersona"];
    echo "<p>Primer apellido:</p>";
    echo $_POST["apellidoUnoPersona"];
    echo "<p>Segundo apellido:</p>";
    echo $_POST["apellidoDosPersona"];
    echo "<p>Fecha de nacimiento:</p>";
    echo $_POST["fechaPersona"];
    echo "<p>Género:</p>";
    if ($_POST["generoPersona"] == "H") {
        echo "Hombre " . $_POST["generoPersona"];
    } else {
        echo "Mujer " . $_POST["generoPersona"];
    }
    echo "<p>Vivo:</p>";
    if ($_POST["vivoPersona"] == "true") {
        echo "Vivo " . $_POST["vivoPersona"];
    } else {
        echo "Muerto " . $_POST["vivoPersona"];
    }
    echo "<p>Descripción::</p>";
    echo $_POST["descripcionPersona"];

    $conexion = new mysqli("192.168.1.20", "skills", "1234", "skills");
    if ($conexion->connect_error) { die("Ha habido un error en la conexión"); }

    $query = "insert into personas (dni, nombre, apellido_1, apellido_2, fecha_de_nac, genero, vivo, descripcion)
    values ('" . $_POST["dniPersona"] . "','" . $_POST["nombrePersona"] . "','" . $_POST["apellidoUnoPersona"] .
    "','" . $_POST["apellidoDosPersona"] . "','" . $_POST["fechaPersona"] . "','" . $_POST["generoPersona"] .
    "', " . $_POST["vivoPersona"] . ",'" . $_POST["descripcionPersona"] . "');";

    if ($conexion->query($query) === TRUE) {echo "añadido";}
    else {echo "<p>Error</p>";}
    $conexion->close();
?>

<br/>
<a href="../index.html">Volver al formulario</a>