<?php
use API\backend\Productos;
require_once __DIR__ . "../API/Productos.php";
//SE CREA NUEVO OBJETO DE CLASE PRODUCTO
$producto_single = new Productos();
//SE BUSCA ELPRODUCTO EN SOLITARIO
$producto_single->single($_GET['id']);
//SE OBTIENE LA RESPUESTA 
echo $producto_single->getResponse();