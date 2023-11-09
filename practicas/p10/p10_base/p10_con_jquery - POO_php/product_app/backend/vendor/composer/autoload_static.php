<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7dad1b1546e67ef6f34f2713c580f67c
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'API\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'API\\' => 
        array (
            0 => __DIR__ . '/../..' . '/API',
        ),
    );

    public static $classMap = array (
        'API\\Actualizar\\Actualizar' => __DIR__ . '/../..' . '/API/Actualizar/Actualizar.php',
        'API\\Agregar\\Agregar' => __DIR__ . '/../..' . '/API/Agregar/Agregar.php',
        'API\\BD\\DataBase' => __DIR__ . '/../..' . '/API/BD/DataBase.php',
        'API\\Eliminar\\Eliminar' => __DIR__ . '/../..' . '/API/Eliminar/Eliminar.php',
        'API\\Leer\\Leer' => __DIR__ . '/../..' . '/API/Leer/Leer.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7dad1b1546e67ef6f34f2713c580f67c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7dad1b1546e67ef6f34f2713c580f67c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit7dad1b1546e67ef6f34f2713c580f67c::$classMap;

        }, null, ClassLoader::class);
    }
}
