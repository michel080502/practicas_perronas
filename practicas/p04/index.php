<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 4</title>
</head>

<body>
    <h2> Ejercicio 1</h2>
    <p>Escribir programa para comprobar si un número es un múltiplo de 5 y 7</p>
    <form action="http://localhost/tecweb/practicas/p04/index.php" method="get">
        <label for="num">Número: </label><br>
        <input type="number" name="numero">
        <input type="submit">
        <br>
    </form>
    <?php
    if (isset($_GET['numero'])) {
        $num = $_GET['numero'];
        if ($num % 5 == 0 && $num % 7 == 0) {
            echo '<h3>R= El número ' . $num . ' SÍ es múltiplo de 5 y 7.</h3>';
        } else {
            echo '<h3>R= El número ' . $num . ' NO es múltiplo de 5 y 7.</h3>';
        }
    }
    ?>
    <br>
</body>

</html>