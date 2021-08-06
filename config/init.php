
<?php

require_once 'config.php';


spl_autoload_register('myAutoLoader');

function myAutoLoader($class_name) {

    if (file_exists('Controllers/'.$class_name.'.php')) {
        require_once ('Controllers/'.$class_name.'.php');
    } else
        require_once ('classes/'.$class_name.'.php');
}

