<?php
namespace API\Eliminar;
use API\BD\DataBase;

class Eliminar extends DataBase{
    public function eliminar($id)
    {
        $this->response = array(
            'status'  => 'error',
            'message' => 'La consulta falló'
        );
        if (!empty($id)) {
            // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
            $sql = "UPDATE productos SET eliminado=1 WHERE id = {$id}";
            if ($this->conexion->query($sql)) {
                $this->response['status'] =  "success";
                $this->response['message'] =  "Producto eliminado";
            } else {
                $this->response['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($this->conexion);
            }
            $this->conexion->close();
        }
    }
}