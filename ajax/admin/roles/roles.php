<?php
//Libs________________________________________________________________________________________________________________________________________________________
require_once '../../../config/db.php';
require_once '../../../config/config.php';
require_once '../../../helpers/helpers.php';
require_once '../../../models/ParentModel.php';
require_once '../../../models/inners/UserModel.php';
require_once '../../../models/inners/RolModel.php';
require_once '../../../models/inners/ModuleModel.php';
require_once '../../../models/inners/PermissionModel.php';
//Variables___________________________________________________________________________________________________________________________________________________
$action = isset($_POST['action']) != false ? filter_var($_POST['action'], FILTER_SANITIZE_STRING) : false;
$id = isset($_POST['id']) != false ? filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT) : false;
$nombre = isset($_POST['nombre']) != false ? filter_var($_POST['nombre'], FILTER_SANITIZE_STRING) : false;
$nivel = isset($_POST['nivel']) != false ? filter_var($_POST['nivel'], FILTER_SANITIZE_NUMBER_INT) : false;
$permissions[0] = isset($_POST['dashboard']) != false ? filter_var($_POST['dashboard'], FILTER_SANITIZE_STRING) : false;
$permissions[1] = isset($_POST['usuarios']) != false ? filter_var($_POST['usuarios'], FILTER_SANITIZE_STRING) : false;
$permissions[2] = isset($_POST['roles']) != false ? filter_var($_POST['roles'], FILTER_SANITIZE_STRING) : false;
$permissions[3] = isset($_POST['productos']) != false ? filter_var($_POST['productos'], FILTER_SANITIZE_STRING) : false;
$permissions[4] = isset($_POST['categorias']) != false ? filter_var($_POST['categorias'], FILTER_SANITIZE_STRING) : false;
$permissions[5] = isset($_POST['galeria']) != false ? filter_var($_POST['galeria'], FILTER_SANITIZE_STRING) : false;
$permissions[6] = isset($_POST['consultas']) != false ? filter_var($_POST['consultas'], FILTER_SANITIZE_STRING) : false;
$permissions[7] = isset($_POST['domicilios']) != false ? filter_var($_POST['domicilios'], FILTER_SANITIZE_STRING) : false;
$permissions[8] = isset($_POST['chequeras']) != false ? filter_var($_POST['chequeras'], FILTER_SANITIZE_STRING) : false;
session_start();
//Crear Rol________________________________________________________________________________________________________________________________________________
if ($action == 'newRol') {
    if (
        $nombre == false ||
        $nivel == false ||
        $action == false
    ) {
        die(json_encode(setMessageArray('error', 'errorInputs')));
    } else {
        $obj = new RolModel();
        $obj->setNombre($nombre);
        $obj->setNivel($nivel);
    }
    try {
        $result = $obj->insert();
        $idRol = $obj->selectByName()['id'];
        $obj = new ModuleModel();
        $qnModules = $obj->quantity()[0]['quant'];
        $modules = $obj->select();
        try {
            $obj = new PermissionModel();
            $obj->setIdRol($idRol);
            for ($i = 0; $i <= $qnModules - 1; $i++) {
                $obj->setIdModulo($modules[$i]['id']);
                if ($permissions[$i] == 'on') {
                    $obj->setEstado(1);
                } else {
                    $obj->setEstado(0);
                }
                $result = $obj->insert();
                if ($result['type'] == 'error') {
                    die(json_encode($result));
                }
            }
        } catch (Exception $e) {
            $result = setMessageArray('error', 'error');
        }
    } catch (Exception $e) {
        $result = setMessageArray('error', 'error');
    }
    die(json_encode($result));
}
//Editar Rol_________________________________________________________________________________________________________________________________________________
if ($action == 'editRol') {
    if (
        $id == false ||
        $nombre == false ||
        $nivel == false ||
        $action == false
    ) {
        die(json_encode(setMessageArray('error', 'errorInputs')));
    } else {
        $obj = new RolModel();
        $obj->setId($id);
        $obj->setNombre($nombre);
        $obj->setNivel($nivel);
    }
    try {
        $result = $obj->update();
        if ($result['status'] == 'success') {
            $obj = new ModuleModel();
            $qnModules = $obj->quantity()[0]['quant'];
            $modules = $obj->select();
            try {
                $obj = new PermissionModel();
                $obj->setIdRol($id);
                for ($i = 0; $i <= $qnModules - 1; $i++) {
                    $obj->setIdModulo($modules[$i]['id']);
                    if ($permissions[$i] == 'on') {
                        $obj->setEstado(1);
                    } else {
                        $obj->setEstado(0);
                    }
                    $result = $obj->update();
                    if ($result['type'] == 'error') {
                        die(json_encode($result));
                    }
                }
                if ($_SESSION['user']['id'] == $id) {
                    if (isset($_COOKIE['mail'])) {
                        setcookie('type', $nombre, time() + (60 * 60 * 24 * 30 * 12), "/");
                    }
                    $_SESSION['user']['idType'] = $id;
                    $_SESSION['user']['type'] = $nombre;
                    $_SESSION['user']['lvlType'] = $nivel;
                }
            } catch (Exception $e) {
                $result = setMessageArray('error', 'error');
            }
        }
    } catch (Exception $e) {
        $result = setMessageArray('error', 'error');
    }
    die(json_encode($result));
}
//Eliminar Rol________________________________________________________________________________________________________________________________________________
if ($action == 'deleteRol') {
    if ($id == false) {
        die(json_encode(setMessageArray('error', 'errorInputs')));
    } else {
        try {
            $obj = new UserModel();
            $obj->setIdRol($id);
            if (empty($obj->quantityByRol()[0]['quant'])) {
                $obj = new PermissionModel();
                $obj->setIdRol($id);
                $result = $obj->delete();
                try {
                    $obj = new RolModel();
                    $obj->setId($id);
                    $result = $obj->delete();
                } catch (Exception $e) {
                    $result = setMessageArray('error', 'error');
                }
            } else {
                $result = setMessageArray('error', 'errorUserRol');
            }
        } catch (Exception $e) {
            $result = setMessageArray('error', 'error');
        }
        die(json_encode($result));
    }
}
//________________________________________________________________________________________________________________________________________________________________
