<?php
use API\backend\Productos;
require_once __DIR__ . "../API/Productos.php";
//SE CREA NUEVO OBJETO DE CLASE PRODUCTO
$producto_listados = new Productos();
//SE LISTAN TODOS LOS PRODUCTOS
$producto_listados->listar();
//SE OBTIENE LA RESPUESTA DE LOS PRODUCTOS LISTADOS
echo $producto_listados->getResponse();