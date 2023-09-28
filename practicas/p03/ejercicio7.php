<h2>Ejercicio 7</h2>
<p>Usando la variable predefinida $_SERVER, determina lo siguiente:</p>
<div>
    <?php
    echo '<p>a. La versión de Apache y PHP: </p>';
    $versioApache = $_SERVER['SERVER_SOFTWARE'];
    $phpVersion = phpversion();

    echo "<p>Versión de Apache: $versioApache</p>";
    echo "<p>Versión de PHP: $phpVersion</p>";

    echo '<p>b. Nombre del sistema operativo (servidor)</p>';
    echo php_uname();

    echo '<p>c. Idioma del navegador (cliente)</p>';
    $idioma = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
    echo $idioma;
    ?>
</div>