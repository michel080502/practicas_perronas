<?php
use API\Leer\Leer;

require_once __DIR__ . "/API/start.php";
//SE CREA NUEVO OBJETO DE CLASE PRODUCTO
$producto_single = new Leer();
//SE BUSCA ELPRODUCTO EN SOLITARIO
$producto_single->single($_GET['id']);
//SE OBTIENE LA RESPUESTA 
echo $producto_single->getResponse();