<?php
class conectar
{
    public static function conexion()
    {
        $conexion = new mysqli("localhost", "root", "", "clinica_medica");
        return $conexion;
    }
}

?>