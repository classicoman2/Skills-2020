<style>
p {
    font-weight: bold;
    font-size: large;
}
</style>
<?php
    echo "<h1>Estos son los valores que has introducido:</h1>";
    
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
?>