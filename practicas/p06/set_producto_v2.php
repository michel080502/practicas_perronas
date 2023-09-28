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

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST['nombre'];
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $precio = $_POST['precio'];
        $detalles = $_POST['detalles'];
        $unidades = $_POST['unidades'];
        $imagen = $_POST['img'];

        $validador = false;

        if (!empty($nombre) && !empty($marca) && !empty($modelo) && !empty($precio) && !empty($detalles) && !empty($unidades) && !empty($imagen)) {
            if (!preg_match("/^[a-zA-Z ]+$/", $nombre)) {
                echo "<p>Por favor ingresa un nombre valido</p>";
            } elseif (!preg_match("/^[-a-zA-Z0-9 ]+$/", $marca)) {
                echo "<p>Por favor ingresa una marca valido</p>";
            } elseif (!preg_match("/^[0-9.,]+$/", $precio)) {
                echo "<p>Por favor ingresa un precio valido</p>";
            } elseif (!preg_match("/^[a-zA-Z0-9.%:, ]+$/", $detalles)) {
                echo "<p>Por favor ingresa un campo valido</p>";
            } elseif (!preg_match("/^[0-9]+$/", $unidades)) {
                echo "<p>Por favor ingresa modelos validos</p>";
            } elseif (!preg_match("/^[-a-zA-Z0-9 ]+$/", $modelo)) {
                echo "<p>Por favor ingresa unidades validas</p>";
            } elseif (!preg_match("/^[-a-zA-Z0-9_.\/]+$/", $imagen)) {
                echo "<p>Por favor ingresa una imagen valida</p>";
            } else {
                $validador = true;
            }
        } else {
            echo 'Por favor completa los campos';
        }


        if ($validador) {
            /** SE CREA EL OBJETO DE CONEXION */
            @$link = new mysqli('localhost', 'root', '202027099', 'marketzone');

            /** comprobar la conexión */
            if ($link->connect_errno) {
                die('Falló la conexión: ' . $link->connect_error . '<br/>');
                /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */
            }
            /** Crear una tabla que no devuelve un conjunto de resultados */
            $sql = "INSERT INTO productos VALUES (null, '{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, '{$imagen}')";
            if ($link->query($sql)) {
                echo '<h1>Producto insertado con ID: ' . $link->insert_id . '</h1>';
                echo "	<h2> Acerca del producto registrado:</h2>";
                echo '<ul>';
                echo "<li><strong>Nombre:</strong> <em>$nombre</em></li>";
                echo "<li><strong>Marca:</strong> <em>$marca</em></li>";
                echo "<li><strong>Modelo:</strong> <em>$modelo</em></li>";
                echo "<li><strong>Precio:</strong> <em>$precio</em></li>";
                echo "<li><strong>Unidades:</strong> <em>$unidades</em></li>";
                echo "<li><strong>Detalles:</strong> <em>$detalles</em></li>";
                echo "<li><strong>Imagen:</strong> <em><img width= 100 height= 150  src= $imagen ></em></li>";
                echo "</ul>";
            } else {
                echo 'El Producto no pudo ser insertado =(';
            }
            $link->close();
        }
    }

    ?>
</body>
</head>