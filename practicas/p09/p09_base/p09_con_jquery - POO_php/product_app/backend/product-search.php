<?php
use API\backend\Productos;
require_once __DIR__ . "../API/Productos.php";
//SE CREA NUEVO OBJETO DE CLASE PRODUCTO
$producto_buscar = new Productos();
//SE BUSCA ELPRODUCTO
$producto_buscar->buscar($_GET['search']);
//SE OBTIENE LA RESPUESTA 
echo $producto_buscar->getResponse();
?>