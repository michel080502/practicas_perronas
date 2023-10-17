<?php

use function PHPSTORM_META\type;

include_once __DIR__ . '/database.php';
$result = array("mensaje" => "");
// SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
$producto = file_get_contents('php://input');
if (!empty($producto)) {
    // SE TRANSFORMA EL STRING DEL JASON A OBJETO
    $jsonOBJ = json_decode($producto);
    //SE EVALUA SI EL PRODUCTO YA EXISTE EN LA BASE DE DATOS
    $existe = $conexion->query("SELECT * FROM productos WHERE nombre = '{$jsonOBJ->nombre}' AND eliminado = 0 ");
    $novigente = $conexion->query("SELECT * FROM productos WHERE nombre = '{$jsonOBJ->nombre}' AND eliminado = 1");

    if ($existe->num_rows == 0) {
        $sql = "INSERT INTO productos VALUES (null, '{$jsonOBJ->nombre}', '{$jsonOBJ->marca}', '{$jsonOBJ->modelo}', {$jsonOBJ->precio}, '{$jsonOBJ->detalles}', {$jsonOBJ->unidades}, '{$jsonOBJ->imagen}',0)";
        if ($conexion->query($sql)) {
            $result["mensaje"] = "Un nuevo producto se ha registrado exitosamente";
        } else {
            $result["mensaje"] = "El producto no se pudo registrado exitosamente";
        }
    } elseif ($novigente->num_rows == 1) {
        $sql = "INSERT INTO productos VALUES (null, '{$jsonOBJ->nombre}', '{$jsonOBJ->marca}', '{$jsonOBJ->modelo}', {$jsonOBJ->precio}, '{$jsonOBJ->detalles}', {$jsonOBJ->unidades}, '{$jsonOBJ->imagen}',0)";
        if ($conexion->query($sql)) {
            $result["mensaje"] = "El producto registrado ya existia en la base de datos pero ahora se encuentra vigente";
        } else {
            $result["mensaje"] = "El producto no se pudo registrado exitosamente";
        }
    } else {
        $result["mensaje"] = "El producto ya se encuentra registrado en la base de datos y está vigente";
    }
}
$conexion->close();

echo json_encode($result, JSON_PRETTY_PRINT);
