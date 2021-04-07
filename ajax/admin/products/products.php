<?php
//Libs________________________________________________________________________________________________________________________________________________________
require_once '../../../config/db.php';
require_once '../../../config/config.php';
require_once '../../../helpers/helpers.php';
require_once '../../../models/ParentModel.php';
require_once '../../../models/inners/ProductModel.php';
//Variables___________________________________________________________________________________________________________________________________________________
$action = isset($_POST['action']) != false ? filter_var($_POST['action'], FILTER_SANITIZE_STRING) : false;
$id = isset($_POST['id']) != false ? filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT) : false;
$nombre = isset($_POST['nombre']) != false ? filter_var($_POST['nombre'], FILTER_SANITIZE_STRING) : false;
$idCategoria = isset($_POST['categoria']) != false ? filter_var($_POST['categoria'], FILTER_SANITIZE_STRING) : false;
$precio = isset($_POST['precio']) != false ? filter_var($_POST['precio'], FILTER_SANITIZE_NUMBER_FLOAT) : false;
$descripcion = isset($_POST['descripcion']) != false ? $_POST['descripcion'] : false;
$stock = isset($_POST['stock']) != false ? filter_var($_POST['stock'], FILTER_SANITIZE_NUMBER_INT) : false;
$foto = isset($_FILES['image']['name']) && $_FILES['image']['name'] != '' ? $_FILES['image'] : false;
$fotoSecundaria = isset($_FILES['secondaryImage']['name']) && $_FILES['secondaryImage']['name'] != '' ? $_FILES['secondaryImage'] : false;
$status = $stock != 0 ? filter_var(1, FILTER_SANITIZE_NUMBER_INT) : 0;
$lastImage = isset($_POST['lastImage']) != false ? filter_var($_POST['lastImage'], FILTER_SANITIZE_STRING) : false;
$lastSecondaryImage = isset($_POST['lastSecondaryImage']) != false ? filter_var($_POST['lastSecondaryImage'], FILTER_SANITIZE_STRING) : false;
//Crear Producto________________________________________________________________________________________________________________________________________________
if ($action == 'newProduct') {
    if (
        $nombre == false ||
        $idCategoria == false ||
        $precio == false ||
        $stock < 0 ||
        $foto == false
    ) {
        die(json_encode(setMessageArray('error', 'errorInputs')));
    } else {
        $obj  = new ProductModel();
        $obj->setNombre($nombre);
        $obj->setIdCategoria($idCategoria);
        $obj->setPrecio($precio);
        $obj->setDescripcion($descripcion);
        $obj->setStock($stock);
        $obj->setStatus($status);
        if ($foto) {
            $statusImage = checkProfileImage($foto['type'], $foto['size']);
            if ($statusImage['status'] == 'error') {
                die(json_encode(setMessageArray($statusImage['status'], $statusImage['type'])));
            } else if ($statusImage['status'] == 'success') {
                $dir = array();
                $dir = getDirImage($foto['name'], '../../../assets/img/products/main/');
                if (move_uploaded_file($foto['tmp_name'], $dir['dir'])) {
                    $obj->setFotoPrincipal($dir['dir_db']);
                } else {
                    die(json_encode(setMessageArray('error', 'errorSaveImage')));
                }
            } else {
                die(json_encode(setMessageArray('error', 'error')));
            }
        }
        if ($fotoSecundaria) {
            $statusImage = checkProfileImage($fotoSecundaria['type'], $fotoSecundaria['size']);
            if ($statusImage['status'] == 'error') {
                die(json_encode(setMessageArray($statusImage['status'], $statusImage['type'])));
            } else if ($statusImage['status'] == 'success') {
                $dir = array();
                $dir = getDirImage($fotoSecundaria['name'], '../../../assets/img/products/secondary/');
                if (move_uploaded_file($fotoSecundaria['tmp_name'], $dir['dir'])) {
                    $obj->setFotoSecundaria($dir['dir_db']);
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
//Eliminar Producto________________________________________________________________________________________________________________________________________________
if ($action == 'deleteProduct') {
    if ($id == false) {
        die(json_encode(setMessageArray('error', 'errorInputs')));
    } else {
        $obj = new ProductModel();
        $obj->setId($id);
        try {
            $result = $obj->delete();
            deleteImage($lastImage, '../../../assets/img/products/main/');
            deleteImage($lastSecondaryImage, '../../../assets/img/products/secondary/');
        } catch (Exception $e) {
            $result = setMessageArray('error', 'error');
        }
        die(json_encode($result));
    }
}
//________________________________________________________________________________________________________________________________________________________________
