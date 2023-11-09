<?php
namespace API\Actualizar;
use API\BD\DataBase;
class Actualizar extends DataBase{
    public function editar($jsonOBJ)
    {
        $producto = json_encode($jsonOBJ);
        $this->response = array(
            'status'  => 'error',
            'message' => 'Error al editar'
        );

        if (!empty($producto)) {
            // SE ASUME QUE LOS DATOS YA FUERON VALIDADOS ANTES DE ENVIARSE
            $sql = "UPDATE productos SET nombre = '{$jsonOBJ->nombre}', marca = '{$jsonOBJ->marca}', 
            modelo = '{$jsonOBJ->modelo}', precio = {$jsonOBJ->precio}, detalles = '{$jsonOBJ->detalles}', unidades = {$jsonOBJ->unidades}, imagen = '{$jsonOBJ->imagen}' 
             WHERE id = {$jsonOBJ->id}";
            $result = $this->conexion->query($sql);

            if ($result) {
                $this->response['status'] =  "success";
                $this->response['message'] =  "Producto editado";
            } else {
                $this->response['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($this->conexion);
            }
            $this->conexion->close();
        }
    }
}