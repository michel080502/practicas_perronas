<!DOCTYPE html PUBLIC “-//W3C//DTD XHTML 1.1//EN” “http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd”>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang=“es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title> Solucion de ejercicio 5 </title>
</head>

<body>
    <?php
    if (isset($_POST['edad'], $_POST['genero'])) {
        $edad = $_POST['edad'];
        $genero = $_POST['genero'];
        if ($edad >= 18 && $edad <= 35 && $genero == 'femenino') {
            echo "Bienvenida usted esta en el rango de edad permitido! ";
        } elseif ($edad == null) {
            echo "Ingrese su edad";
        } elseif ($genero == 0) {
            echo "Ingrese su genero";
        } else {
            echo "Lamentablemente usted no esta en el rango permitido de edad :c";
        }
    }
    ?>

</body>

</html>