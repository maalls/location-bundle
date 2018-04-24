<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf394434ae485a606e992c9f8d4478656
{
    public static $files = array (
        '92c8763cd6170fce6fcfe7e26b4e8c10' => __DIR__ . '/..' . '/symfony/phpunit-bridge/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Bridge\\PhpUnit\\' => 23,
        ),
        'M' => 
        array (
            'Maalls\\LocationBundle\\' => 22,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Bridge\\PhpUnit\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/phpunit-bridge',
        ),
        'Maalls\\LocationBundle\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf394434ae485a606e992c9f8d4478656::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf394434ae485a606e992c9f8d4478656::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}