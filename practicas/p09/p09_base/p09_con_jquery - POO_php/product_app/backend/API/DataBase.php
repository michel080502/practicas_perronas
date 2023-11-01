<?php
namespace API\backend;

abstract class DataBase {
    protected $conexion;
    public function __construct($database="marketzone") {
        $this->conexion = @mysqli_connect(
            'localhost',
            'root',
            '202027099',
            $database
        );
        if(!$this->conexion) {
            die('¡Base de datos NO conectada!');
        }
    }
}
