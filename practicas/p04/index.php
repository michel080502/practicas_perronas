<!DOCTYPE html PUBLIC “-//W3C//DTD XHTML 1.1//EN” “http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd”>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang=“es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title> Practica 4 </title>
</head>

<body>
    <h2> Ejercicio 1</h2>
    <p>Escribir programa para comprobar si un número es un múltiplo de 5 y 7</p>
    <form action="http://localhost/tecweb_new/practicas/p04/index.php" method="get">
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
    $band = true;
    $iteracion = 0;
    $numgenerados = 0;
    do {
        $num1 = rand(1, 9999);
        $num2 = rand(1, 9999);
        $num3 = rand(1, 9999);
        $iteracion++;
        $numgenerados += 3;
        $matriz[] = [$num1, $num2, $num3];
        if ($num1 % 2 != 0 && $num2 % 2 == 0 && $num3 % 2 != 0) {
            $band = false;
        }
    } while ($band);

    //Recorre todo el arreglo 
    foreach ($matriz as $fila) {
        //imprime el contenido de la matriz por fila y separa cada elemento con un espacio
        echo implode(", ", $fila) . "<br>";
    };

    echo "<p>Numero de iteraciones: $iteracion</p>";
    echo "<p>Numeros generados: $numgenerados</p>"

    ?>

    <h2>Ejercicio 3</h2>
    <p>Utiliza un ciclo while para encontrar el primer número entero obtenido aleatoriamente,
        pero que además sea múltiplo de un número dado.</p>
    <form action="http://localhost/tecweb_new/practicas/p04/index.php" method="get">
        <label for="num">Dame un número: </label>
        <input type="number" name="numeroDado">
        <input type="submit">
    </form>
    <br>

    <?php
    if (isset($_GET['numeroDado'])) {
        $numeroDado = $_GET['numeroDado'];
        $numeroAleatorio = rand(1, 999);

        while ($numeroAleatorio % $numeroDado !== 0) {
            $numerosGenerados[] = $numeroAleatorio;
            $numeroAleatorio = rand(1, 999);
        }
        $numerosGenerados[] = $numeroAleatorio;

        echo "El primer número entero aleatorio que es múltiplo de $numeroDado es: $numeroAleatorio <br>";
        echo "Los numeros generados aleatoriamnete fueron:";
        echo implode(", ", $numerosGenerados);
    }
    ?>
    <p>Variante de script con do-while:</p>
    <?php
    if (isset($_GET['numeroDado'])) {
        $numeroDado1 = $_GET['numeroDado'];
        do {
            $numeroAleatorio1 = rand(1, 999);
            $numerosGenerados1[] = $numeroAleatorio1;
        } while ($numeroAleatorio1 % $numeroDado1 !== 0);
        echo "El primer número entero aleatorio que es múltiplo de $numeroDado1 es: $numeroAleatorio1 <br>";
        echo "Los numeros generados aleatoriamnete fueron: <br> ";
        echo implode(", ", $numerosGenerados1);
    }
    ?>

    <h2>Ejercicio 4</h2>
    <p>Crear un arreglo cuyos índices van de 97 a 122 y cuyos valores son las letras de la ‘a’
        a la ‘z’. Usa la función chr(n) que devuelve el caracter cuyo código ASCII es n para poner
        el valor en cada índice. Es decir:</p>

    <?php
    for ($i = 97; $i < 123; $i++) {
        $letra = chr($i);
        $abc[$i] =  $letra;
    }

    //Inicia la tabla
    echo '<table style = "  border-collapse: collapse; width: 100%;" >';
    //Imprime fila de los indices
    echo '<tr>';
    foreach ($abc as $key => $value) {
        echo '<th style = "border : 1px solid;">' . $key . '</th>';
    }
    //Termina la fila de indices
    echo '</tr>';

    //Inicia fila de los valores
    echo '<tr>';
    foreach ($abc as $key => $value) {
        echo '<td style = "border : 1px solid;   text-align: center;">' . $value . '</td>';
    }
    //Termina la fila de los valores
    echo '</tr>';
    //Termina la tabla
    echo '</table>';
    ?>

</body>

</html>