<!DOCTYPE html PUBLIC “-//W3C//DTD XHTML 1.1//EN” “http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd”>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang=“es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title> Solucion de ejercicio 6 </title>
</head>

<body>
    <?php
    $parqueVehicular = array();
    $parqueVehicular["ABC890"] = array(
        "Auto" => array("Marca" => "Ford", "Modelo" => "Focus", "Tipo" => "Sedan"),
        "Propietario" => array("Nombre" => "Michel Alvarez", "Ciudad" => "Puebla", "Direccion" => "Manuel Kant 5420")
    );
    $parqueVehicular["XYZ123"] = array(
        "Auto" => array("Marca" => "Chevrolet", "Modelo" => "Cruze", "Tipo" => "Sedan"),
        "Propietario" => array("Nombre" => "Ana López", "Ciudad" => "Ciudad de México", "Direccion" => "Avenida Principal 123")
    );

    $parqueVehicular["DEF456"] = array(
        "Auto" => array("Marca" => "Toyota", "Modelo" => "Camry", "Tipo" => "Sedan"),
        "Propietario" => array("Nombre" => "Carlos Sánchez", "Ciudad" => "Guadalajara", "Direccion" => "Calle Secundaria 789")
    );

    $parqueVehicular["GHI789"] = array(
        "Auto" => array("Marca" => "Honda", "Modelo" => "Fit", "Tipo" => "Hatchback"),
        "Propietario" => array("Nombre" => "Laura Rodríguez", "Ciudad" => "Monterrey", "Direccion" => "Calle Principal 456")
    );

    $parqueVehicular["JKL012"] = array(
        "Auto" => array("Marca" => "Volkswagen", "Modelo" => "Golf", "Tipo" => "Hatchback"),
        "Propietario" => array("Nombre" => "Pedro Pérez", "Ciudad" => "Querétaro", "Direccion" => "Avenida Central 789")
    );

    $parqueVehicular["MNO345"] = array(
        "Auto" => array("Marca" => "Nissan", "Modelo" => "Sentra", "Tipo" => "Sedan"),
        "Propietario" => array("Nombre" => "María García", "Ciudad" => "Tijuana", "Direccion" => "Calle 1234")
    );

    $parqueVehicular["PQR678"] = array(
        "Auto" => array("Marca" => "Ford", "Modelo" => "Mustang", "Tipo" => "Sedan"),
        "Propietario" => array("Nombre" => "José Ramírez", "Ciudad" => "Ciudad Juárez", "Direccion" => "Avenida Norte 567")
    );

    $parqueVehicular["STU901"] = array(
        "Auto" => array("Marca" => "Kia", "Modelo" => "Sportage", "Tipo" => "Camioneta"),
        "Propietario" => array("Nombre" => "Luis Torres", "Ciudad" => "Hermosillo", "Direccion" => "Calle Sur 890")
    );

    $parqueVehicular["VWX234"] = array(
        "Auto" => array("Marca" => "Hyundai", "Modelo" => "Elantra", "Tipo" => "Sedan"),
        "Propietario" => array("Nombre" => "Fernanda Martínez", "Ciudad" => "Cancún", "Direccion" => "Avenida Oeste 123")
    );

    $parqueVehicular["YZA567"] = array(
        "Auto" => array("Marca" => "Mazda", "Modelo" => "CX-5", "Tipo" => "Camioneta"),
        "Propietario" => array("Nombre" => "Roberto López", "Ciudad" => "Veracruz", "Direccion" => "Calle Este 456")
    );

    $parqueVehicular["BCD890"] = array(
        "Auto" => array("Marca" => "Audi", "Modelo" => "A4", "Tipo" => "Sedan"),
        "Propietario" => array("Nombre" => "Silvia Ruiz", "Ciudad" => "Mérida", "Direccion" => "Avenida Principal 789")
    );

    $parqueVehicular["EFG123"] = array(
        "Auto" => array("Marca" => "Subaru", "Modelo" => "Outback", "Tipo" => "Camioneta"),
        "Propietario" => array("Nombre" => "Javier González", "Ciudad" => "Toluca", "Direccion" => "Calle 234")
    );

    $parqueVehicular["HIJ456"] = array(
        "Auto" => array("Marca" => "BMW", "Modelo" => "X3", "Tipo" => "Camioneta"),
        "Propietario" => array("Nombre" => "Elena Castro", "Ciudad" => "Acapulco", "Direccion" => "Avenida Norte 567")
    );

    $parqueVehicular["KLM789"] = array(
        "Auto" => array("Marca" => "Jeep", "Modelo" => "Cherokee", "Tipo" => "Camioneta"),
        "Propietario" => array("Nombre" => "Ricardo Morales", "Ciudad" => "Pachuca", "Direccion" => "Calle Principal 890")
    );

    $parqueVehicular["NOP012"] = array(
        "Auto" => array("Marca" => "Tesla", "Modelo" => "Model 3", "Tipo" => "Sedan"),
        "Propietario" => array("Nombre" => "Alejandra López", "Ciudad" => "Culiacán", "Direccion" => "Calle 1234")
    );

    $parqueVehicular["QRS345"] = array(
        "Auto" => array("Marca" => "Fiat", "Modelo" => "500", "Tipo" => "Hatchback"),
        "Propietario" => array("Nombre" => "Daniel Ríos", "Ciudad" => "Mazatlán", "Direccion" => "Avenida Oeste 567")
    );
    $matriculabuscar = $_POST['matricula'];
    if (!empty($matriculabuscar) || !empty($todos) ) {
        $band = true;
        foreach ($parqueVehicular as $matricula => $informacion) {
            if ($matriculabuscar == $matricula) {
                echo "Auto con la matricula " . $matriculabuscar . " contiene la información: <br>";
                echo "<pre>";
                print_r($informacion);
                echo "</pre>";
                break;
            }else{
                $band = false;
            }
        }
        if($band == false){
            echo "El auto con la matricula '".$matriculabuscar."' no esta registrado en la base";
        }
    }else {
        echo "Escribe una matricula";
    }
    ?>

</body>

</html>