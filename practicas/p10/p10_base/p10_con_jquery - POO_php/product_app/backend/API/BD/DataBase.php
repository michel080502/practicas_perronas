<?php
namespace API\BD;

abstract class DataBase {
    protected $conexion;
    protected $response;
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

    public function getResponse()
    {
        return json_encode($this->response, JSON_PRETTY_PRINT);
    }
}
