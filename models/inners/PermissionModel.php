<?php
class PermissionModel extends ParentModel
{
    //Variables___________________________________________________________________________________________________________________________________________________
    private $idRol;
    private $idModulo;
    private $estado;
    //____________________________________________________________________________________________________________________________________________________________
    function __construct()
    {
        parent::__construct();
    }
    //Getters y Setters___________________________________________________________________________________________________________________________________________
    public function getIdRol()
    {
        return $this->idRol;
    }
    public function setIdRol($idRol)
    {
        $this->idRol = $this->db->real_escape_string($idRol);
    }
    public function getIdModulo()
    {
        return $this->idModulo;
    }
    public function setIdModulo($idModulo)
    {
        $this->idModulo = $this->db->real_escape_string($idModulo);
    }
    public function getEstado()
    {
        return $this->estado;
    }
    public function setEstado($estado)
    {
        $this->estado = $this->db->real_escape_string($estado);
    }
    //Insertar____________________________________________________________________________________________________________________________________________________
    public function insert()
    {
        $idRol = $this->getIdRol();
        $idModulo = $this->getIdModulo();
        $estado = $this->getEstado();
        try {
            $sql = "INSERT INTO `permisos` (`idRol`, `idModulo`, `estado`) VALUES ('$idRol', '$idModulo', '$estado')";
            $result = $this->db->query($sql);
            if ($result) {
                $result = setMessageArray('success', 'success');
            } else {
                $result = setMessageArray('error', 'error');
            }
        } catch (Exception $e) {
            $result = setMessageArray('error', 'error');
        }
        return $result;
    }
    //Seleccionar___________________________________________________________________________________________________________________________________________________
    function select()
    {
        $permissions = array();
        try {
            $sql = "SELECT * FROM `permisos` order by id asc";
            $result = $this->db->query($sql);
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $temp_array = array(
                        'id' => $row['id'],
                        'idRol' => $row['idRol'],
                        'idModulo' => $row['idModulo'],
                        'permiso' => $row['estado']
                    );
                    array_push($permissions, $temp_array);
                }
                $result = setMessageArray('success', 'success');
            } else {
                $result = setMessageArray('error', 'error');
            }
        } catch (Exception $e) {
            $result = setMessageArray('error', 'error');
        }
        return $permissions;
    }
    //Seleccionar Por Id Rol__________________________________________________________________________________________________________________________________________
    function selectByIdRol()
    {
        $permission = array();
        $idRol = $this->getIdRol();
        try {
            $sql = "SELECT permisos.*, modulos.nombre as nombreModulo FROM `permisos` inner join modulos on permisos.idModulo = modulos.id WHERE permisos.idRol = $idRol";
            $result = $this->db->query($sql);
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $temp_array = array(
                        'id' => $row['id'],
                        'idRol' => $row['idRol'],
                        'idModulo' => $row['idModulo'],
                        'nombreModulo' => $row['nombreModulo'],
                        'permiso' => $row['estado']
                    );
                    array_push($permission, $temp_array);
                }
                $result = setMessageArray('success', 'success');
            } else {
                $result = setMessageArray('error', 'error');
            }
        } catch (Exception $e) {
            $result = setMessageArray('error', 'error');
        }
        return $permission;
    }
    //Actualizar______________________________________________________________________________________________________________________________________________________
    public function update()
    {
        $idRol = $this->getIdRol();
        $idModulo = $this->getIdModulo();
        $estado = $this->getEstado();
        try {
            $sql = "UPDATE `permisos` SET `estado` = '$estado', editado = NOw() WHERE `idRol` = $idRol AND `idModulo` = $idModulo";
            $result = $this->db->query($sql);
            if ($result) {
                $result = setMessageArray('success', 'success');
            } else {
                $result = setMessageArray('error', 'error');
            }
        } catch (Exception $e) {
            $result = setMessageArray('error', 'error');
        }
        return $result;
    }
    //Eliminar_______________________________________________________________________________________________________________________________________________________
    public function delete()
    {
        $idRol = $this->getIdRol();
        try {
            $sql = "DELETE FROM `permisos` where idRol = $idRol";
            $result = $this->db->query($sql);
            if ($result) {
                $result = setMessageArray('success', 'success');
            } else {
                $result = setMessageArray('error', 'error');
            }
        } catch (Exception $e) {
            $result = setMessageArray('error', 'error');
        }
        return $result;
    }
}
//____________________________________________________________________________________________________________________________________________________________________