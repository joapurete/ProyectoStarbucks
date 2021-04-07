<?php
//Libs________________________________________________________________________________________________________________________________________________________
require_once '../../../config/db.php';
require_once '../../../config/config.php';
require_once '../../../helpers/helpers.php';
require_once '../../../models/ParentModel.php';
require_once '../../../models/inners/ConsultModel.php';
//Variables___________________________________________________________________________________________________________________________________________________
$action = isset($_POST['action']) != false ? filter_var($_POST['action'], FILTER_SANITIZE_STRING) : false;
$id = isset($_POST['id']) != false ? filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT) : false;
//Eliminar Consulta___________________________________________________________________________________________________________________________________________
if ($action == 'deleteConsult') {
    if ($id == false) {
        die(json_encode(setMessageArray('error', 'errorInputs')));
    } else {
        $obj = new ConsultModel();
        $obj->setId($id);
        try {
            $result = $obj->delete();
        } catch (Exception $e) {
            $result = setMessageArray('error', 'error');
        }
        die(json_encode($result));
    }
}
//________________________________________________________________________________________________________________________________________________________________
