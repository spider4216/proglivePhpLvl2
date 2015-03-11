<?php

function __autoload($myClassName)
{
    $classParts = explode('\\', $myClassName);
    $classParts[0] = __DIR__;
    $path = implode(DIRECTORY_SEPARATOR, $classParts) . '.php';
    if (file_exists($path)) {
        require $path;
    }
}

?>