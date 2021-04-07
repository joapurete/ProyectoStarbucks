<?php
//Libs________________________________________________________________________________________________________________________________________________________
include_once '../../config/db.php';
include_once '../../config/config.php';
require_once '../../helpers/helpers.php';
include_once '../../models/ParentModel.php';
include_once '../../models/inners/UserModel.php';
//Variables___________________________________________________________________________________________________________________________________________________
$mail = isset($_POST['mail']) != false ? filter_var($_POST['mail'], FILTER_SANITIZE_STRING) : false;
$password = isset($_POST['password']) != false ? filter_var($_POST['password'], FILTER_SANITIZE_STRING) : false;
$check = isset($_POST['check']) != false ? filter_var($_POST['check'], FILTER_SANITIZE_STRING) : false;
$action = isset($_POST['action']) != false ? filter_var($_POST['action'], FILTER_SANITIZE_STRING) : false;
//Login_______________________________________________________________________________________________________________________________________________________
if ($action == 'login') {
    if ($mail == false || $password == false) {
        die(json_encode(setMessageArray('error', 'errorInputs')));
    } else {
        $obj = new UserModel();
        $obj->setMail($mail);
        try {
            $user = $obj->login();
            if (isset($user['id'])) {
                if (validateHash($password, $user['password'])) {
                    session_start();
                    $_SESSION['user']['id'] = $user['id'];
                    $_SESSION['user']['idType'] = $user['idRol'];
                    $_SESSION['user']['type'] = $user['nombreRol'];
                    $_SESSION['user']['lvlType'] = $user['nivelRol'];
                    $_SESSION['user']['nombre'] = $user['nombre'];
                    $_SESSION['user']['apellido'] = $user['apellido'];
                    $_SESSION['user']['image'] = $user['foto'];
                    $_SESSION['user']['mail'] = $user['mail'];
                    if ($check == 'on') {
                        setcookie('id', $_SESSION['user']['id'], time() + (60 * 60 * 24 * 30 * 12), "/");
                        setcookie('type', $_SESSION['user']['type'], time() + (60 * 60 * 24 * 30 * 12), "/");
                        setcookie('mail', $_SESSION['user']['mail'], time() + (60 * 60 * 24 * 30 * 12), "/");
                    }
                    $result = setMessageArray('success', 'success');
                } else {
                    $result = setMessageArray('error', 'notFound');
                }
            } else {
                $result = setMessageArray('error', 'notFound');
            }
        } catch (Exception $e) {
            setMessageArray('error', 'error');
        }
        die(json_encode($result));
    }
}
//________________________________________________________________________________________________________________________________________________________________
