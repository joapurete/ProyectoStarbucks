<?php
//Libs________________________________________________________________________________________________________________________________________________________
require_once '../../../config/db.php';
require_once '../../../config/config.php';
require_once '../../../helpers/helpers.php';
require_once '../../../models/ParentModel.php';
require_once '../../../models/inners/UserModel.php';
require_once '../../../models/inners/RolModel.php';
//Variables___________________________________________________________________________________________________________________________________________________
$action = isset($_POST['action']) != false ? filter_var($_POST['action'], FILTER_SANITIZE_STRING) : false;
$id = isset($_POST['id']) != false ? filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT) : false;
$nombre = isset($_POST['nombre']) != false ? filter_var($_POST['nombre'], FILTER_SANITIZE_STRING) : false;
$apellido = isset($_POST['apellido']) != false ? filter_var($_POST['apellido'], FILTER_SANITIZE_STRING) : false;
$idRol = isset($_POST['rol']) != false ? filter_var($_POST['rol'], FILTER_SANITIZE_STRING) : false;
$mail = isset($_POST['mail']) != false ? filter_var($_POST['mail'], FILTER_SANITIZE_EMAIL) : false;
$tel = isset($_POST['tel']) != false ? filter_var($_POST['tel'], FILTER_SANITIZE_STRING) : false;
$password = isset($_POST['password']) != false ? filter_var($_POST['password'], FILTER_SANITIZE_STRING) : false;
$realPassword = isset($_POST['realPassword']) != false ? filter_var($_POST['realPassword'], FILTER_SANITIZE_STRING) : false;
$currentPassword = isset($_POST['currentPassword']) != false ? filter_var($_POST['currentPassword'], FILTER_SANITIZE_STRING) : false;
$foto = isset($_FILES['image']['name']) && $_FILES['image']['name'] != '' ? $_FILES['image'] : false;
$imagenAntigua = isset($_POST['imagenAntigua']) != false ? filter_var($_POST['imagenAntigua'], FILTER_SANITIZE_STRING) : false;
session_start();
//Crear Usuario________________________________________________________________________________________________________________________________________________
if ($action == 'new') {
    if (
        $nombre == false ||
        $apellido == false ||
        $idRol == false ||
        $mail == false ||
        $password == false ||
        $action == false
    ) {
        die(json_encode(setMessageArray('error', 'errorInputs')));
    } else {
        $obj  = new UserModel();
        $obj->setId($id);
        $obj->setNombre($nombre);
        $obj->setApellido($apellido);
        $obj->setIdRol($idRol);
        $obj->setMail($mail);
        $obj->setTel($tel);
        $obj->setPassword(setHash($password));
        if ($foto) {
            $statusImage = checkProfileImage($foto['type'], $foto['size']);
            if ($statusImage['status'] == 'error') {
                die(json_encode(setMessageArray($statusImage['status'], $statusImage['type'])));
            } else if ($statusImage['status'] == 'success') {
                $dir = array();
                $dir = getDirImage($foto['name'], '../../../assets/img/users/');
                if (move_uploaded_file($foto['tmp_name'], $dir['dir'])) {
                    $obj->setFoto($dir['dir_db']);
                } else {
                    die(json_encode(setMessageArray('error', 'errorSaveImage')));
                }
            } else {
                die(json_encode(setMessageArray('error', 'error')));
            }
        }
    }
    try {
        $result = $obj->insert();
    } catch (Exception $e) {
        $result = setMessageArray('error', 'error');
    }
    die(json_encode($result));
}
//Editar Usuario_________________________________________________________________________________________________________________________________________________
if ($action == 'editUser') {
    if (
        $nombre == false ||
        $apellido == false ||
        $idRol == false ||
        $mail == false ||
        $action == false
    ) {
        die(json_encode(setMessageArray('error', 'errorInputs')));
    } else {
        $obj = new UserModel();
        $obj->setId($id);
        $obj->setNombre($nombre);
        $obj->setApellido($apellido);
        $obj->setIdRol($idRol);
        $obj->setMail($mail);
        $obj->setTel($tel);
        if ($foto) {
            $statusImage = checkProfileImage($foto['type'], $foto['size']);
            if ($statusImage['status'] == 'error') {
                die(json_encode(setMessageArray($statusImage['status'], $statusImage['type'])));
            } else if ($statusImage['status'] == 'success') {
                $dir = array();
                $dir = getDirImage($foto['name'], '../../../assets/img/users/');
                if (move_uploaded_file($foto['tmp_name'], $dir['dir'])) {
                    $obj->setFoto($dir['dir_db']);
                    deleteImage($imagenAntigua, '../../../assets/img/users/');
                } else {
                    die(json_encode(setMessageArray('error', 'errorSaveImage')));
                }
            } else {
                die(json_encode(setMessageArray('error', 'error')));
            }
        } else {
            $obj->setFoto($imagenAntigua);
        }
    }
    try {
        $result = $obj->update();
        if ($result['status'] == 'success') {
            $result = $obj->updateRol();
            if ($result['status'] == 'success') {
                if ($_SESSION['user']['id'] == $id) {
                    $user = $obj->selectById();
                    $_SESSION['user']['nombre'] = $nombre;
                    $_SESSION['user']['apellido'] = $apellido;
                    $_SESSION['user']['idType'] = $idRol;
                    $_SESSION['user']['type'] = $user['nombreRol'];
                    $_SESSION['user']['mail'] = $mail;
                    $_SESSION['user']['image'] = $obj->getFoto();
                    if (isset($_COOKIE['mail'])) {
                        setcookie('mail', $_SESSION['user']['mail'], time() + (60 * 60 * 24 * 30 * 12), "/");
                        setcookie('type', $_SESSION['user']['type'], time() + (60 * 60 * 24 * 30 * 12), "/");
                    }
                }
            }
        }
    } catch (Exception $e) {
        $result = setMessageArray('error', 'error');
    }
    die(json_encode($result));
}
//Editar Password__________________________________________________________________________________________________________________________________________________
if ($action == 'editUserPass') {
    if (
        $password == false
    ) {
        die(json_encode(setMessageArray('error', 'errorInputs')));
    } else {
        $obj = new UserModel();
        $obj->setId($_SESSION['user']['id']);
        $obj->setPassword(setHash($password));
        try {
            $result = $obj->updatePass();
        } catch (Exception $e) {
            $result = setMessageArray('error', 'error');
        }
        die(json_encode($result));
        die(json_encode($result));
    }
}
//Eliminar Usuario________________________________________________________________________________________________________________________________________________
if ($action == 'delete') {
    if ($id == false) {
        die(json_encode(setMessageArray('error', 'errorInputs')));
    } else {
        $obj = new UserModel();
        $obj->setId($id);
        try {
            $result = $obj->delete();
            deleteImage($imagenAntigua, '../../../assets/img/users/');
        } catch (Exception $e) {
            $result = setMessageArray('error', 'error');
        }
        die(json_encode($result));
    }
}
//________________________________________________________________________________________________________________________________________________________________
