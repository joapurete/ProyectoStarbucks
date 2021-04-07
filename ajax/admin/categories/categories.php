<?php
//Libs________________________________________________________________________________________________________________________________________________________
require_once '../../../config/db.php';
require_once '../../../config/config.php';
require_once '../../../helpers/helpers.php';
require_once '../../../models/ParentModel.php';
require_once '../../../models/inners/CategoryModel.php';
require_once '../../../models/inners/ProductModel.php';
//Variables___________________________________________________________________________________________________________________________________________________
$action = isset($_POST['action']) != false ? filter_var($_POST['action'], FILTER_SANITIZE_STRING) : false;
$id = isset($_POST['id']) != false ? filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT) : false;
$nombre = isset($_POST['nombre']) != false ? filter_var($_POST['nombre'], FILTER_SANITIZE_STRING) : false;
//Crear Categoria______________________________________________________________________________________________________________________________________________
if ($action == 'newCategory') {
    if (
        $nombre == false ||
        $action == false
    ) {
        die(json_encode(setMessageArray('error', 'errorInputs')));
    } else {
        $obj  = new CategoryModel();
        $obj->setNombre($nombre);
        try {
            $result = $obj->insert();
        } catch (Exception $e) {
            $result = setMessageArray('error', 'error');
        }
        die(json_encode($result));
    }
}
//Editar Categoria_____________________________________________________________________________________________________________________________________________
if ($action == 'editCategory') {
    if (
        $nombre == false ||
        $id == false ||
        $action == false
    ) {
        die(json_encode(setMessageArray('error', 'errorInputs')));
    } else {
        $obj  = new CategoryModel();
        $obj->setId($id);
        $obj->setNombre($nombre);
        try {
            $result = $obj->update();
        } catch (Exception $e) {
            $result = setMessageArray('error', 'error');
        }
        die(json_encode($result));
    }
}
//Eliminar Categoria_______________________________________________________________________________________________________________________________________
if ($action == 'deleteCategory') {
    if ($id == false) {
        die(json_encode(setMessageArray('error', 'errorInputs')));
    } else {
        $obj = new ProductModel();
        $obj->setIdCategoria($id);
        if (empty($obj->quantityByCategory()[0]['quant'])) {
            $obj = new CategoryModel();
            $obj->setId($id);
            try {
                $result = $obj->delete();
            } catch (Exception $e) {
                $result = setMessageArray('error', 'error');
            }
            die(json_encode($result));
        } else {
            die(json_encode(setMessageArray('error', 'errorProduct')));
        }
    }
}
//________________________________________________________________________________________________________________________________________________________________
