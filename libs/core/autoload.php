<?php
//Controllers_____________________________________________________________________________________________________________________________________________________
spl_autoload_register(function ($class) {
    if (file_exists('controllers/inners/' . $class . '.php')) {
        require_once('controllers/inners/' . $class . '.php');
    }
});
//Libs___________________________________________________________________________________________________________________________________________________________
spl_autoload_register(function ($class) {
    if (file_exists('libs/core/' . $class . '.php')) {
        require_once('libs/core/' . $class . '.php');
    }
});
//_______________________________________________________________________________________________________________________________________________________________
