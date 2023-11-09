<?php

use API\Eliminar\Eliminar;

require_once __DIR__ . "/API/start.php";
//SE CREA NUEVO OBJETO DE CLASE PRODUCTO
$producto_elimminar = new Eliminar();
//SE ELIMINA EL PRODUCTO CON SU ID DE REFERENCIA f
$producto_elimminar->eliminar($_GET['id']);
//SE OBTIENE LA RESPUESTA 
echo $producto_elimminar->getResponse();
