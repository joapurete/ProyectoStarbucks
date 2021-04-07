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
//Editar Perfil________________________________________________________________________________________________________________________________________________
if ($action == 'editProfile') {
    if (
        $nombre == false ||
        $apellido == false ||
        $idRol == false ||
        $mail == false ||
        $action == false
    ) {
        die(json_encode(setMessageArray('error', 'errorInputs')));
    } else {
        if (!isset($idRol)) {
            die(json_encode(setMessageArray('error', 'errorRol')));
        } else {
            $obj = new UserModel();
            $obj->setId($_SESSION['user']['id']);
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
    }
    try {
        $result = $obj->update();
        if ($result['status'] == 'success') {
            $result = $obj->updateMail();
            if ($result['status'] == 'success') {
                $result = $obj->updateRol();
                if ($result['status'] == 'success') {
                    $user = $obj->selectById();
                    if (isset($_SESSION['user']['nombre'])) {
                        $_SESSION['user']['nombre'] = $nombre;
                    }
                    if (isset($_SESSION['user']['apellido'])) {
                        $_SESSION['user']['apellido'] = $apellido;
                    }
                    if (isset($_SESSION['user']['type'])) {
                        $_SESSION['user']['idType'] = $idRol;
                        $_SESSION['user']['type'] = $user['nombreRol'];
                    }
                    if (isset($_SESSION['user']['mail'])) {
                        $_SESSION['user']['mail'] = $mail;
                    }
                    if (isset($foto['name'])) {
                        $_SESSION['user']['image'] = $obj->getFoto();
                    }
                    if (isset($_COOKIE['mail'])) {
                        setcookie('mail', $mail, time() + (60 * 60 * 24 * 30 * 12), "/");
                        setcookie('type', $user['nombreRol'], time() + (60 * 60 * 24 * 30 * 12), "/");
                    }
                } else {
                    $result = setMessageArray('error', 'error');
                }
            } else {
                $result = setMessageArray('error', 'error');
            }
        } else {
            $result = setMessageArray('error', 'error');
        }
    } catch (Exception $e) {
        $result = setMessageArray('error', 'error');
    }
    die(json_encode($result));
}
//Editar Pass_______________________________________________________________________________________________________________________________________________________
if ($action == 'editPass') {
    if (
        $password == false ||
        $currentPassword == false ||
        $realPassword == false
    ) {
        die(json_encode(setMessageArray('error', 'errorInputs')));
    } else {
        if (validateHash($currentPassword, $realPassword)) {
            $obj = new UserModel();
            $obj->setId($_SESSION['user']['id']);
            $obj->setPassword(setHash($password));
            try {
                $result = $obj->updatePass();
            } catch (Exception $e) {
                $result = setMessageArray('error', 'error');
            }
            die(json_encode($result));
        } else {
            $result = setMessageArray('error', 'errorValidate');
        }
        die(json_encode($result));
    }
}
//__________________________________________________________________________________________________________________________________________________________________