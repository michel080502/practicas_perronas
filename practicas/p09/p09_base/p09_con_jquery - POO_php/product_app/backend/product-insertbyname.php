<?php
use API\backend\Productos;
require_once __DIR__ . "../API/Productos.php";
//SE CREA NUEVO OBJETO DE CLASE PRODUCTO
$producto_byname = new Productos();
//SE BUSCA ELPRODUCTO
$producto_byname->singlebyName($_GET['name']);
//SE OBTIENE LA RESPUESTA 
echo $producto_byname->getResponse();
?>