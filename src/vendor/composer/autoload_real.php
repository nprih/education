<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit63afa90a9bb1cf9b7782b466f3c738de
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

        spl_autoload_register(array('ComposerAutoloaderInit63afa90a9bb1cf9b7782b466f3c738de', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit63afa90a9bb1cf9b7782b466f3c738de', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit63afa90a9bb1cf9b7782b466f3c738de::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}