<?php
namespace API\Agregar;
use API\BD\DataBase;

class Agregar extends DataBase {
    public function agregar($jsonOBJ)
    {
        $producto = json_encode($jsonOBJ);
        $this->response = array(
            'status'  => 'error',
            'message' => 'Ya existe un producto con ese nombre'
        );
        if (!empty($producto)) {
            $sql = "SELECT * FROM productos WHERE nombre = '{$jsonOBJ->nombre}' AND eliminado = 0";
            $result = $this->conexion->query($sql);
            if ($result->num_rows == 0) {
                $this->conexion->set_charset("utf8");
                $sql = "INSERT INTO productos VALUES (null, '{$jsonOBJ->nombre}', '{$jsonOBJ->marca}', '{$jsonOBJ->modelo}', {$jsonOBJ->precio}, '{$jsonOBJ->detalles}', {$jsonOBJ->unidades}, '{$jsonOBJ->imagen}', 0)";
                if ($this->conexion->query($sql)) {
                    $this->response['status'] =  "success";
                    $this->response['message'] =  "Producto agregado";
                } else {
                    $this->response['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($this->conexion);
                }
            }
            $result->free();
            // Cierra la conexion
            $this->conexion->close();
        }
    }
}