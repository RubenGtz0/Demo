<?php

class Database {

    private $hoostname = "localhost"; //127.0.0.1 en lugar de local host 
    private $database = "Sport_Shop"; //Nueva actualizacion en entorno de bd
    private $username = "root";
    private $password = "";
    private $charset = "utf8";

    function conectar() 
    {
        try {
        $conexion = "mysql:host=" . $this->hoostname . "; dbname=" . $this->database . "; charset=" . $this->charset;
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false
        ];

        $pdo = new PDO($conexion, $this->username, $this->password, $options);

        return $pdo;
    } catch(PDOException $e){
        echo 'Error conexion: ' . $e->getMessage();
        exit;
    }
    }
    }

?>