<?php
use API\Leer\Leer;

require_once __DIR__ . "/API/start.php";
//SE CREA NUEVO OBJETO DE CLASE PRODUCTO
$producto_byname = new Leer();
//SE BUSCA ELPRODUCTO
$producto_byname->singlebyName($_GET['name']);
//SE OBTIENE LA RESPUESTA 
echo $producto_byname->getResponse();
?>