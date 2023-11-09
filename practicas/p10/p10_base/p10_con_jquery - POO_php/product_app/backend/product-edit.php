<?php

use API\Actualizar\Actualizar;

require_once __DIR__ . "/API/start.php";
// SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
$producto = file_get_contents('php://input');
//LA INFORMACION SE CONVIERTE A OBJETO JSON
$jsonOBJ = json_decode($producto);
//SE CREA NUEVO OBJETO DE CLASE PRODUCTO
$producto_editar = new Actualizar();
//SE EDITA ELPRODUCTO
$producto_editar->editar($jsonOBJ);
//SE OBTIENE LA RESPUESTA 
echo $producto_editar->getResponse();