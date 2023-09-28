<h2>Ejercicio 4</h2>
<p> Lee y muestra los valores de las variables del ejercicio anterior, pero ahora con la ayuda de
    la matriz $GLOBALS o del modificador global de PHP.</p>
<?php
$a2 = 'PHP5';
$z2[] = &$a2;
$b2 = '5a version de PHP';
@$c2 = $b2 * 10;
$a2 .= $b2;
@$b2 *= $c2;
$z2[0] = 'MySQL';
function varibaleglobal()
{
    global $a2, $b2, $c2, $z2;
    $x = $a2 . $b2 . $c2;
    echo "<pre>";
    print_r($z2);
    echo "</pre>";
    echo "<pre>";
    print_r($x);
    echo "</pre>";
};
varibaleglobal();
?>