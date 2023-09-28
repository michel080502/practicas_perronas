<h2>Ejercicio 3</h2>
<p>Muestra el contenido de cada variable inmediatamente después de cada asignación,
    verificar la evolución del tipo de estas variables (imprime todos los componentes de los
    arreglo):</p>
<div>
    <?php
    $a1 = 'PHP5';
    echo "<p>El valor de a es $a1 </p>";
    $z1[] = &$a1;
    echo "<p>El valor de z es: </p>";
    echo "<pre>";
    print_r($z1);
    echo "</pre>";
    $b1 = '5a version de PHP';
    echo "<p>El valor de b es $b1 </p>";
    @$c1 = $b1 * 10;
    echo "<p>El  valor de c $c1 </p>";
    $a1 .= $b1;
    echo "<p>El nuevo valor de a es $a1 </p>";
    @$b1 *= $c1;
    echo "<p>El nuevo valor de b $b1 </p>";
    $z1[0] = 'MySQL';
    echo "<p>El nuevo valor de z es : </p>";
    echo "<pre>";
    print_r($z1);
    echo "</pre>";
    ?>
</div>