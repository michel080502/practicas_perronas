<?php
include_once __DIR__ . '/database.php';

// SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA DE JSON CON LAS INSTANCIAS DE LA CONSULTA
$data = array();
// SE VERIFICA HABER RECIBIDO EL ID
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
    if ($result = $conexion->query("SELECT * FROM productos WHERE id = '{$id}'  || nombre like '{$id}%' || marca like '{$id}%' || detalles like '{$id}%' ")) {
        //SE VALIDA SI LA QUERY DEVUELVE ALGUNA INSTANCIA
        if (!is_null($result)) {
            // SE OBTIENEN LOS RESULTADOS
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                //SE CREA ARREGLO QUE GUARDA LOS DATOS DE LA INSTANCIA
                $productData = array();
                // SE CODIFICAN A UTF-8 LOS DATOS Y SE MAPEAN AL ARREGLO DE RESPUESTA
                foreach ($row as $key => $value) {
                    $productData[$key] = utf8_encode($value);
                }
                // SE AGREGA LA INSTANCIA AL ARREGLO DE INSTANCIAS 
                $data[] = $productData;
            }
        }
        $result->free();
    } else {
        die('Query Error: ' . mysqli_error($conexion));
    }
    $conexion->close();
}

// SE HACE LA CONVERSIÓN DE ARRAY A JSON
echo json_encode($data, JSON_PRETTY_PRINT);
