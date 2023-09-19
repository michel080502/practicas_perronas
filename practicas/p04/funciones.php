<?php
function ejercicio1($num)
{
    if ($num % 5 == 0 && $num % 7 == 0) {
        echo '<h3>R= El número ' . $num . ' SÍ es múltiplo de 5 y 7.</h3>';
    } else {
        echo '<h3>R= El número ' . $num . ' NO es múltiplo de 5 y 7.</h3>';
    }
}

function ejercicio2()
{
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
    echo "<p>Numeros generados: $numgenerados</p>";
}

function ejercicio3($numeroDado)
{
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

function ejercicio3var($numeroDado1)
{
    do {
        $numeroAleatorio1 = rand(1, 999);
        $numerosGenerados1[] = $numeroAleatorio1;
    } while ($numeroAleatorio1 % $numeroDado1 !== 0);
    echo "El primer número entero aleatorio que es múltiplo de $numeroDado1 es: $numeroAleatorio1 <br>";
    echo "Los numeros generados aleatoriamnete fueron: <br> ";
    echo implode(", ", $numerosGenerados1);
}

function ejercicio4()
{
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
}

