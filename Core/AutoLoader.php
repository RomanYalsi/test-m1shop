<?php

namespace Project\Core;

use Project\Core\Patterns\Singleton;

require_once __DIR__ . '/Patterns/Base.php';
require_once __DIR__ . '/Patterns/Singleton.php';

class AutoLoader
{
    use Singleton;

    public function init()
    {
        // Register the loader method
        spl_autoload_register(array(__CLASS__, '_loadClasses'));
    }

    private function _loadClasses($sClass)
    {
        $sClass = str_replace(array(__NAMESPACE__, 'Project', '\\'), '/', $sClass);

        if (is_file(__DIR__ . '/' . $sClass . '.php'))
            require_once __DIR__ . '/' . $sClass . '.php';

        if (is_file(ROOT_PATH . $sClass . '.php'))
            require_once ROOT_PATH . $sClass . '.php';
    }

}
