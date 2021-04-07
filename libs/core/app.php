<?php
//Aplicación_______________________________________________________________________________________________________________________________________________________
if (isset($_GET['controller'])) {
    $nameClass = $_GET['controller'] . 'Controller';
    if (@class_exists($nameClass)) {
        $obj = new $nameClass();
        if (isset($_GET['method'])) {
            $methodClass = $_GET['method'];
            if (@method_exists($nameClass, $methodClass)) {
                $obj->$methodClass();
            } else {
                $obj->start();
            }
        } else {
            $obj->start();
        }
    } else {
        $obj = new IndexController;
        $obj->start();
    }
} else {
    $obj = new IndexController;
    $obj->start();
}
//_________________________________________________________________________________________________________________________________________________________________
