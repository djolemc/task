<?php


spl_autoload_register('myAutoLoader');


function myAutoLoader($class_name)
{
    $folders = ['Controllers', 'classes', 'classes/ValidationRules', 'classes/interfaces'];

    foreach ($folders as $folder) {
        if (file_exists($folder . '/' . $class_name . '.php')) {
            require_once($folder . '/' . $class_name . '.php');
        }
    }


}
