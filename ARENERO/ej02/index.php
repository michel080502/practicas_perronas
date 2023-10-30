<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require_once __DIR__ ."/menu.php";

    $menu1 = new Menu;

    $menu1->cargar_opcion('https://facebook.com','FACEBOOK');
    $menu1->cargar_opcion('https://instagram.com','INSTAGRAM');
    $menu1->cargar_opcion('https://buap.mx','BUAP');
    $menu1->mostrar();
    ?>
</body>
</html>