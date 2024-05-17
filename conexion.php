<?php
class Conexion {
    private $servername = "127.0.0.1";
    private $username = "root";
    private $password = "";
    private $database = "tu_usuario";
    private $conexion;

    public function __construct() {
        $this->conexion = new mysqli($this->servername, $this->username, $this->password, $this->database);
        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }
    }

    public function ejecutarConsulta($sql) {
        return $this->conexion->query($sql);
    }

    
}
?>
