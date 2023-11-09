<?php
use API\Leer\Leer;

require_once __DIR__ . "/API/start.php";
//SE CREA NUEVO OBJETO DE CLASE PRODUCTO
$producto_listados = new Leer();
//SE LISTAN TODOS LOS PRODUCTOS
$producto_listados->listar();
//SE OBTIENE LA RESPUESTA DE LOS PRODUCTOS LISTADOS
echo $producto_listados->getResponse();