<?php
//Cookies____________________________________________________________________________________________________________________________________________________________________________
if (!isset($_SESSION['cargado'])) {
    if (isset($_COOKIE['id']) && isset($_COOKIE['type']) && isset($_COOKIE['mail'])) {
        require_once 'models/ParentModel.php';
        require_once 'models/inners/UserModel.php';
        $obj = new UserModel();
        $obj->setId($_COOKIE['id']);
        $obj->setMail($_COOKIE['mail']);
        $user = $obj->loginByCookie();
        if (isset($user['id'])) {
            $_SESSION['user']['id'] = $user['id'];
            $_SESSION['user']['idType'] = $user['idRol'];
            $_SESSION['user']['type'] = $user['nombreRol'];
            $_SESSION['user']['lvlType'] = $user['nivelRol'];
            $_SESSION['user']['nombre'] = $user['nombre'];
            $_SESSION['user']['apellido'] = $user['apellido'];
            $_SESSION['user']['image'] = $user['foto'];
            $_SESSION['user']['mail'] = $user['mail'];
        } else {
            setcookie('id', '', time() - 100, '/');
            setcookie('type', '', time() - 100, '/');
            setcookie('mail', '', time() - 100, '/');
        }
    } else {
        setcookie('id', '', time() - 100, '/');
        setcookie('type', '', time() - 100, '/');
        setcookie('mail', '', time() - 100, '/');
    }
}
$_SESSION['cargado'] = true;
//__________________________________________________________________________________________________________________________________________________________________________________