<h2>Ejercicio 6</h2>
<p>Dar y comprobar el valor booleano de las variables $a, $b, $c, $d, $e y $f y muéstralas
    usando la función var_dump(datos).</p>
<div>
    <?php
    $a4 = "0";
    $b4 = "TRUE";
    $c4 = FALSE;
    $d4 = ($a4 or $b4);
    $e4 = ($a4 and $c4);
    $f4 = ($a4 xor $b4);
    echo 'a4: ';
    var_dump($a4);
    echo '<br/>';
    echo 'b4: ';
    var_dump($b4);
    echo '<br/>';
    echo 'c4: ';
    var_dump($c4);
    echo '<br/>';
    echo 'd4: ';
    var_dump($d4);
    echo '<br/>';
    echo 'e4: ';
    var_dump($e4);
    echo '<br/>';
    echo 'f4: ';
    var_dump($f4);

    echo '<p> Después investiga una función de PHP que permita transformar el valor booleano de $c y $e
    en uno que se pueda mostrar con un echo:</p>';
    echo "<p>El valor booleano de $c4 es: "  . (boolval($c4) ? 'TRUE' : 'FALSE') . "</p>";
    echo "<p>El valor booleano de $e4 es: "  . (boolval($e4) ? 'TRUE' : 'FALSE') . "</p>";
    ?>
</div>