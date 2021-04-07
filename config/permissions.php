<?php
//Permisos Rol____________________________________________________________________________________________________________________________________________________
function getPermission($permissions, $idModule)
{
    if (isset($_SESSION['user']) || isset($_SESSION['user']['id']) || isset($_SESSION['user']['type'])) {
        foreach ($permissions as $row) :
            if ($row['idRol'] == $_SESSION['user']['idType']) {
                if ($row['idModulo'] == $idModule) {
                    if ($row['permiso'] <= 0) {
                        header('Location: ' .  URL . 'Index/start');
                    }
                }
            }
        endforeach;
    } else {
        header('Location: ' .  getUrl() . 'Index/start');
    }
}
//Permisos Menu___________________________________________________________________________________________________________________________________________________
function getPermissionMenu($permissions, $idModule)
{
    foreach ($permissions as $row) :
        if ($row['idRol'] == $_SESSION['user']['idType']) {
            if ($row['idModulo'] == $idModule) {
                if ($row['permiso'] <= 0) {
                    return false;
                } else {
                    return true;
                }
            }
        }
    endforeach;
}
//________________________________________________________________________________________________________________________________________________________________