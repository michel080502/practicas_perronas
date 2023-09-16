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
    <h2>Ejercicio 2</h2>
    <p>Crea un programa para la generación repetitiva de 3 números aleatorios hasta obtener una
        secuencia compuesta por: impar, par, impar</p>
    <?php
    $band= true;
    $iteracion = 0;
    $numgenerados = 0;
    do {
        $num1 = rand(1,9999);
        $num2 = rand(1,9999);
        $num3 = rand(1,9999);
        $iteracion++;
        $numgenerados +=3;
        $matriz[] = [$num1, $num2, $num3];
        if ($num1 % 2 != 0 && $num2 % 2 == 0 && $num3 % 2 != 0) {
            $band = false;
        }
    } while ($band);

    //Recorre todo el arreglo 
    foreach ($matriz as $fila) {
        //imprime el contenido de la matriz por fila y separa cada elemento con un espacio
        echo implode(" ", $fila) . "<br>";
    };

    echo "<p>Numero de iteraciones: $iteracion</p>";
    echo "<p>Numeros generados: $numgenerados</p>"

    ?>

</body>

</html>