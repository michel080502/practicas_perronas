<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="es">

<head>
    <style type="text/css">
        body {
            margin: 20px;
            background-color: #C4DF9B;
            font-family: Verdana, Helvetica, sans-serif;
            font-size: 90%;
        }

        h1 {
            color: #005825;
            border-bottom: 1px solid #005825;
        }

        h2 {
            font-size: 1.2em;
            color: #4A0048;
        }
    </style>
</head>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $precio = $_POST['precio'];
        $detalles = $_POST['detalles'];
        $unidades = $_POST['unidades'];
        $imagen = $_POST['img'];

        /** SE CREA EL OBJETO DE CONEXION */
        @$link = new mysqli('localhost', 'root', '202027099', 'marketzone');

        /** comprobar la conexión */
        if ($link->connect_errno) {
            die('Falló la conexión: ' . $link->connect_error . '<br/>');
            /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */
        }
        /** Crear una tabla que no devuelve un conjunto de resultados */
        $sqlUpdate = "UPDATE productos SET nombre='$nombre', marca='$marca', modelo='$modelo', precio='$precio', detalles='$detalles', unidades='$unidades', imagen='$imagen' WHERE id='$id'";

        if ($link->query($sqlUpdate)) {
            echo "	<h2> Producto actualizado con exito </h2>";
        } else {
            echo "ERROR: No se ejecuto $sqlUpdate. " . mysqli_error($link);
        }
        $link->close();
    } ?>

    <button onclick="principal()">Volver al Inicio</button>
    <script>
        function principal(){
            location.href= "http://localhost/tecweb_new/practicas/p07/get_productos_vigentes_xhtml.php" ;
        }
    </script>
</body>