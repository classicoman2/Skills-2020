<?php

class BDConector {

    private $conexion;
    private $direccion = "192.168.1.20";
    private $bd = "skills";
    private $usuario = "skills";
    private $contrasena = "1234";

    public function abrirConexion() {
        $this->conexion = new mysqli(
            $this->direccion,
            $this->usuario,
            $this->contrasena,
            $this->bd);

        if ($this->conexion->connect_error) { return false; }
        else { return true; }
    }

    public function cerrarConexion() {
        if (!$this->conexion) { return false; }

        $this->conexion->close();
        return true;
    }

    public function ejecutarQuery($query) {
        if (!$this->conexion) { return false; }

        $resultado = $this->conexion->query($query);

        if ($resultado && is_object($resultado)) {
            if ($resultado->num_rows == 0) { return false; }
        }

        return $resultado;
    }

}

?>