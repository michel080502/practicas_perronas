<?php
   use API\backend\Productos;
   require_once __DIR__ . "../API/Productos.php";
   //SE CREA NUEVO OBJETO DE CLASE PRODUCTO
   $producto_elimminar = new Productos();
   //SE ELIMINA EL PRODUCTO CON SU ID DE REFERENCIA 
   $producto_elimminar->eliminar($_GET['id']);
   //SE OBTIENE LA RESPUESTA 
   echo $producto_elimminar->getResponse();
?>