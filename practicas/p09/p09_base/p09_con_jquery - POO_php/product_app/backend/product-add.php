<?php

use API\backend\Productos;

require_once __DIR__ . "../API/Productos.php";
// SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
$producto = file_get_contents('php://input');
//LA INFORMACION SE CONVIERTE A OBJETO JSON
$jsonOBJ = json_decode($producto);
//SE CREA NUEVO OBJETO DE CLASE PRODUCTO
$producto_nuevo = new Productos();
//SE AGREGA ELPRODUCTO
$producto_nuevo->agregar($jsonOBJ);

//SE OBTIENE LA RESPUESTA 
echo $producto_nuevo->getResponse();
