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
    include 'funciones.php'; //Agrega la referencia al archivo con las funciones
    if (isset($_GET['numero'])) {
        ejercicio1($num = $_GET['numero']);
    }
    ?>
    <br>
    <h2>Ejercicio 2</h2>
    <p>Crea un programa para la generación repetitiva de 3 números aleatorios hasta obtener una
        secuencia compuesta por: impar, par, impar</p>
    <?php
    ejercicio2();
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
        ejercicio3($numeroDado = $_GET['numeroDado']);
    }
    ?>
    <p>Variante de script con do-while:</p>
    <?php
    if (isset($_GET['numeroDado'])) {
        ejercicio3var($numeroDado1 = $_GET['numeroDado']);
    }
    ?>

    <h2>Ejercicio 4</h2>
    <p>Crear un arreglo cuyos índices van de 97 a 122 y cuyos valores son las letras de la ‘a’
        a la ‘z’. Usa la función chr(n) que devuelve el caracter cuyo código ASCII es n para poner
        el valor en cada índice. Es decir:</p>

    <?php
    ejercicio4();
    ?>

    <h2>Ejercicio 5</h2>
    <p>Usar las variables $edad y $sexo en una instrucción if para identificar una persona de
        sexo “femenino”, cuya edad oscile entre los 18 y 35 años y mostrar un mensaje de
        bienvenida apropiado.</p>

    <form action="http://localhost/tecweb_new/practicas/p04/forms.php" method="post">
        <label for="edad">Escribe tu edad: </label>
        <input type="number" name="edad">
        <br> <br>
        <label for="sexo">Elige tu sexo: </label>
        <select name="genero" id="genero">
            <option value="0"></option>
            <option value="masculino">Masculino</option>
            <option value="femenino">Femenino</option>
        </select>
        <br> <br>
        <input type="submit">
    </form>

    <h2>Ejercicio 6</h2>
    <p>Crea en código duro un arreglo asociativo que sirva para registrar el parque vehicular de
        una ciudad.</p>
    <form action="http://localhost/tecweb_new/practicas/p04/forms1.php" method="post">
        <label for="matricula">Ingrese matricula del carro a buscar: </label>
        <input type="search" name="matricula">
        <br> <br>
        <input type="submit" value="Buscar">
        <br> 
    </form>

    <form action="http://localhost/tecweb_new/practicas/p04/forms2.php" method="post">
        <input type="submit" value="Ver todos los autos">       
    </form>
</body>

</html>