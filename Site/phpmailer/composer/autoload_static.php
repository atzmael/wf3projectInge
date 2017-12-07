<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit60416bdd2f7fd9d64fdf4a509f2595d0
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit60416bdd2f7fd9d64fdf4a509f2595d0::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit60416bdd2f7fd9d64fdf4a509f2595d0::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
