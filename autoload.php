<?php

function __autoload($myClassName)
{
    if (file_exists(__DIR__ . '/controllers/' . $myClassName . '.php')) {
        require_once __DIR__ . '/controllers/' . $myClassName . '.php';
    } elseif (file_exists(__DIR__ . '/models/' . $myClassName . '.php')) {
    require_once __DIR__ . '/models/' . $myClassName . '.php';
    } elseif (file_exists(__DIR__ . '/classes/' . $myClassName . '.php')) {
        require_once __DIR__ . '/classes/' . $myClassName . '.php';
    }
}

?>