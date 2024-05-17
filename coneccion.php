<?php
class ConexionBD {
    private $servername = "127.0.0.1";
    private $database = "tu_usuario";
    private $username = "root";
    private $password = "";
    private $conn;
    private $conexion;
    
        // Constructor
        public function __construct() {
            // Establecer la conexión a la base de datos
            $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->database);
            if ($this->conn->connect_error) {
                die("Error de conexión: " . $this->conn->connect_error);
            }
        }
    
        // Método para consultar datos con sentencias preparadas
        public function consultarPreparada($sql, $parametros = []) {
            $stmt = $this->conexion->prepare($sql);
            if (!$stmt) {
                die("Error en la preparación de la consulta: " . $this->conexion->error);
            }
    
            // Vincular parámetros si se proporcionan
            if (!empty($parametros)) {
                $tipos = str_repeat('s', count($parametros)); // Suponiendo que todos los parámetros son de tipo cadena (string)
                $valores = array_values($parametros);
                $stmt->bind_param($tipos, ...$valores);
            }
    
            // Ejecutar la consulta
            $stmt->execute();
    
            // Obtener resultados
            $resultado = $stmt->get_result();
            if (!$resultado) {
                die("Error al obtener resultados: " . $this->conexion->error);
            }
    
            // Obtener los datos como un array asociativo
            $datos = $resultado->fetch_all(MYSQLI_ASSOC);
    
            // Cerrar el statement
            $stmt->close();
            return $datos;
        }
    
        // Método para cerrar la conexión
        public function cerrarConexion() {
            $this->conexion->close();
        }
        
    }
    
