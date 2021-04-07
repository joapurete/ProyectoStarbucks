<?php
//Libs________________________________________________________________________________________________________________________________________________________
require_once '../../../config/db.php';
require_once '../../../config/config.php';
require_once '../../../helpers/helpers.php';
require_once '../../../models/ParentModel.php';
require_once '../../../models/inners/GalleryModel.php';
//Variables___________________________________________________________________________________________________________________________________________________
$action = isset($_POST['action']) != false ? filter_var($_POST['action'], FILTER_SANITIZE_STRING) : false;
$id = isset($_POST['id']) != false ? filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT) : false;
$image = isset($_FILES['image']['name']) && $_FILES['image']['name'] != '' ? $_FILES['image'] : false;
$lastImage = isset($_POST['lastImage']) != false ? filter_var($_POST['lastImage'], FILTER_SANITIZE_STRING) : false;
//Agregar Imagen______________________________________________________________________________________________________________________________________________
if ($action == 'newImage') {
    if ($image == false) {
        die(json_encode(setMessageArray('error', 'errorInputs')));
    } else {
        $obj = new GalleryModel();
        $statusImage = checkProfileImage($image['type'], $image['size']);
        if ($statusImage['status'] == 'error') {
            die(json_encode(setMessageArray($statusImage['status'], $statusImage['type'])));
        } else if ($statusImage['status'] == 'success') {
            $dir = array();
            $dir = getDirImage($image['name'], '../../../assets/img/gallery/');
            if (move_uploaded_file($image['tmp_name'], $dir['dir'])) {
                $obj->setFoto($dir['dir_db']);
            } else {
                die(json_encode(setMessageArray('error', 'errorSaveImage')));
            }
        } else {
            die(json_encode(setMessageArray('error', 'error')));
        }
        try {
            $result = $obj->insert();
        } catch (Exception $e) {
            $result = setMessageArray('error', 'error');
        }
        die(json_encode($result));
    }
}
//Eliminar Imagen_______________________________________________________________________________________________________________________________________________
if ($action == 'deleteImage') {
    if ($id == false) {
        die(json_encode(setMessageArray('error', 'errorInputs')));
    } else {
        $obj = new GalleryModel();
        $obj->setId($id);
        try {
            $result = $obj->delete();
            if ($lastImage != false) {
                deleteImage($lastImage, '../../../assets/img/gallery/');
            }
        } catch (Exception $e) {
            $result = setMessageArray('error', 'error');
        }
        die(json_encode($result));
    }
}
//_________________________________________________________________________________________________________________________________________________________________
