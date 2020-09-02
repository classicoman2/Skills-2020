<?php

class ComprobadorDatos {

    public function comprobarDni($dni) {
        return preg_match("/^\d{8}[A-Z]$/", $dni);
    }

    public function comprobarNombre($nombre) {
        return preg_match("/^[A-ZÁ-Ú][a-zá-ú]+(\s[A-ZÁ-Ú][a-zá-ú]+)?$/", $nombre);
    }

    public function comprobarApellidoPrimero($apellido) {
        return preg_match("/^[A-ZÁ-Ú][a-zá-ú]+(\s[A-ZÁ-Ú][a-zá-ú]+)?$/", $apellido);
    }

    public function comprobarApellidoSegundo($apellido) {
        return preg_match("/^([A-ZÁ-Ú][a-zá-ú]+(\s[A-ZÁ-Ú][a-zá-ú]+)?)?$/", $apellido);
    }

    public function comprobarFecha($fecha) {
        if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $fecha)) {
            return 0;
        }

        $fechaSeparada = explode("-", $fecha);
        return checkdate($fechaSeparada[1], $fechaSeparada[2], $fechaSeparada[0]) ? 1 : 0;
    }

    public function comprobarGenero($genero) {
        return preg_match("/^[HF]$/", $genero);
    }

    public function comprobarVivo($vivo) {
        return preg_match("/^[01]$/", $vivo);
    }

    public function comprobarTodo($dni, $nombre, $papellido, $sapellido, $fecha, $genero, $vivo) {
        return ($this->comprobarDni($dni) &&
                $this->comprobarNombre($nombre) &&
                $this->comprobarApellidoPrimero($papellido) &&
                $this->comprobarApellidoSegundo($sapellido) &&
                $this->comprobarFecha($fecha) &&
                $this->comprobarGenero($genero) &&
                $this->comprobarVivo($vivo));
    }
}

?>