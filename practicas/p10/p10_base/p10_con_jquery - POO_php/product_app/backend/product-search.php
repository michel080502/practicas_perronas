<?php
use API\Leer\Leer;

require_once __DIR__ . "/API/start.php";
//SE CREA NUEVO OBJETO DE CLASE PRODUCTO
$producto_buscar = new Leer();
//SE BUSCA ELPRODUCTO
$producto_buscar->buscar($_GET['search']);
//SE OBTIENE LA RESPUESTA 
echo $producto_buscar->getResponse();
?>