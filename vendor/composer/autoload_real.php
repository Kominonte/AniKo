<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitbfa9e6ac39bd053e0dcd8a121ec5de01
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInitbfa9e6ac39bd053e0dcd8a121ec5de01', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitbfa9e6ac39bd053e0dcd8a121ec5de01', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitbfa9e6ac39bd053e0dcd8a121ec5de01::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
