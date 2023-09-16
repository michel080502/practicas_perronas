<?php
echo '<h2>Ejercicio 7</h2>';
echo '<p>Usando la variable predefinida $_SERVER, determina lo siguiente:</p>';
echo '<p>a. La versión de Apache y PHP: </p>';
$versioApache = $_SERVER['SERVER_SOFTWARE'];
$phpVersion = phpversion();

echo "Versión de Apache: $versioApache<br>";
echo "Versión de PHP: $phpVersion";

echo '<p>b. Nombre del sistema operativo (servidor)</p>';
echo php_uname();

echo '<p>c. Idioma del navegador (cliente)</p>';
$idioma = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
echo $idioma;
