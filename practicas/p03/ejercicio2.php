<?php
$a = "ManejadorSQL";
$b = 'MySQL';
$c = &$a;

echo '<h2> Ejercicio 2 </h2>';
echo '<p>a. Ahora muestra el contenido de cada variable:</p>';
echo "<p>El contenido de la variabble a es $a </p>";
echo "<p>El contenido de la variabble b es $b </p>";
echo "<p>El contenido de la variabble c es $c</p>";

$a = 'PHP server';
$b = &$a;

echo '<br>';
echo '<p>b y c. Los nuevos valores asignados son:</p>';
echo "<p>El contenido de la variabble a es $a </p>";
echo "<p>El contenido de la variabble b es $b </p>";

echo '<br>';
echo '<p>d. Las variables a y b se volvieron a asignar por nuevos valores, la variable a se le asigno el valor "PHP server" 
y la variable b se le asigno una referencia a la variable a por lo que tendra el mismo valor de a</p>';
?>