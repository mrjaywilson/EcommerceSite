<?php

spl_autoload_register(function($class) {
    
    if (file_exists(__DIR__ . "/../../business/" . $class . '.php'))
    {
        require_once __DIR__ . "/../../business/" . $class . '.php';
    }
    
    if (file_exists(__DIR__ . "../../controllers/" . $class . '.php'))
    {
        require_once __DIR__ . "../../controllers/" . $class . '.php';
    }
});