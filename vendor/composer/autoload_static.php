<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd180c96283df3f9ee9a0c9c41a626a66
{
    public static $files = array (
        '3917c79c5052b270641b5a200963dbc2' => __DIR__ . '/..' . '/kint-php/kint/init.php',
    );

    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
        'L' => 
        array (
            'Laminas\\Escaper\\' => 16,
        ),
        'K' => 
        array (
            'Kint\\' => 5,
        ),
        'G' => 
        array (
            'Geeklabs\\Breadcrumbs\\' => 21,
        ),
        'C' => 
        array (
            'CodeIgniter\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'Laminas\\Escaper\\' => 
        array (
            0 => __DIR__ . '/..' . '/laminas/laminas-escaper/src',
        ),
        'Kint\\' => 
        array (
            0 => __DIR__ . '/..' . '/kint-php/kint/src',
        ),
        'Geeklabs\\Breadcrumbs\\' => 
        array (
            0 => __DIR__ . '/..' . '/geeklabs/ci4-breadcrumbs',
        ),
        'CodeIgniter\\' => 
        array (
            0 => __DIR__ . '/..' . '/codeigniter4/framework/system',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd180c96283df3f9ee9a0c9c41a626a66::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd180c96283df3f9ee9a0c9c41a626a66::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd180c96283df3f9ee9a0c9c41a626a66::$classMap;

        }, null, ClassLoader::class);
    }
}
