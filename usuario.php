<?php
class Usuario {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function obtenerUsuarios() {
        $sql = "SELECT * FROM usuarios";
        return $this->conexion->ejecutarConsulta($sql);
    }

    // Otros métodos para operaciones relacionadas con usuarios...
}
?>
