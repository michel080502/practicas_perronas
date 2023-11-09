<?php
namespace API\Leer;
use API\BD\DataBase;

class Leer extends DataBase{
    public function listar()
    {
        // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
        if ($result = $this->conexion->query("SELECT * FROM productos WHERE eliminado = 0")) {
            // SE OBTIENEN LOS RESULTADOS
            $rows = $result->fetch_all(MYSQLI_ASSOC);
            if (!is_null($rows)) {
                // SE CODIFICAN A UTF-8 LOS DATOS Y SE MAPEAN AL ARREGLO DE RESPUESTA
                foreach ($rows as $num => $row) {
                    foreach ($row as $key => $value) {
                        $this->response[$num][$key] = utf8_encode($value);
                    }
                }
            }
            $result->free();
        } else {
            die('Query Error: ' . mysqli_error($this->conexion));
        }
        $this->conexion->close();
    }

    public function buscar($search)
    {
        if (!empty($search)) {
            // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
            $sql = "SELECT * FROM productos WHERE (id = '{$search}' OR nombre LIKE '%{$search}%' OR marca LIKE '%{$search}%' OR detalles LIKE '%{$search}%') AND eliminado = 0";
            if ($result = $this->conexion->query($sql)) {
                // SE OBTIENEN LOS RESULTADOS
                $rows = $result->fetch_all(MYSQLI_ASSOC);

                if (!is_null($rows)) {
                    // SE CODIFICAN A UTF-8 LOS DATOS Y SE MAPEAN AL ARREGLO DE RESPUESTA
                    foreach ($rows as $num => $row) {
                        foreach ($row as $key => $value) {
                            $this->response[$num][$key] = utf8_encode($value);
                        }
                    }
                }
                $result->free();
            } else {
                die('Query Error: ' . mysqli_error($this->conexion));
            }
            $this->conexion->close();
        }
    }

    public function single($id)
    {
        $sql = "SELECT * FROM productos  WHERE id = {$id}";
        if ($result = $this->conexion->query($sql)) {
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                // SE CODIFICAN A UTF-8 LOS DATOS Y SE MAPEAN AL ARREGLO DE RESPUESTA
                foreach ($row as $key => $value) {
                    $this->response[$key] = utf8_encode($value);
                }
            }
        } else {
            $this->response['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($this->conexion);
        }
        $this->conexion->close();
    }

    public function singlebyName($name)
    {
        if (!empty($name)) {
            // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
            $sql = "SELECT * FROM productos WHERE  nombre LIKE '%{$name}%'  AND eliminado = 0";
            if ($result = $this->conexion->query($sql)) {
                // SE OBTIENEN LOS RESULTADOS
                $rows = $result->fetch_all(MYSQLI_ASSOC);
                if (!is_null($rows)) {
                    // SE CODIFICAN A UTF-8 LOS DATOS Y SE MAPEAN AL ARREGLO DE RESPUESTA
                    foreach ($rows as $num => $row) {
                        foreach ($row as $key => $value) {
                            $this->response[$num][$key] = utf8_encode($value);
                        }
                    }
                }
                $result->free();
            } else {
                die('Query Error: ' . mysqli_error($this->conexion));
            }
            $this->conexion->close();
        }
    }
}