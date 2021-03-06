<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf7d177e29f847b3e2e68c2a71bf3de60
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'App\\Components\\DB' => __DIR__ . '/../..' . '/src/Components/DB.php',
        'App\\Components\\Router' => __DIR__ . '/../..' . '/src/Components/Router.php',
        'App\\Controllers\\Controller' => __DIR__ . '/../..' . '/src/Controllers/Controller.php',
        'App\\Controllers\\MainController' => __DIR__ . '/../..' . '/src/Controllers/MainController.php',
        'App\\Models\\Main' => __DIR__ . '/../..' . '/src/Models/Main.php',
        'App\\Models\\Model' => __DIR__ . '/../..' . '/src/Models/Model.php',
        'App\\View\\View' => __DIR__ . '/../..' . '/src/View/View.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf7d177e29f847b3e2e68c2a71bf3de60::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf7d177e29f847b3e2e68c2a71bf3de60::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf7d177e29f847b3e2e68c2a71bf3de60::$classMap;

        }, null, ClassLoader::class);
    }
}
