<?php
class RolModel extends ParentModel
{
    //Variables___________________________________________________________________________________________________________________________________________________
    private $nivel;
    //____________________________________________________________________________________________________________________________________________________________
    function __construct()
    {
        parent::__construct();
    }
    //Getters y Setters___________________________________________________________________________________________________________________________________________
    public function getNivel()
    {
        return $this->nivel;
    }
    public function setNivel($nivel)
    {
        $this->nivel = $this->db->real_escape_string($nivel);
    }
    //Insertar____________________________________________________________________________________________________________________________________________________
    public function insert()
    {
        $nombre = $this->getNombre();
        $nivel = $this->getNivel();
        try {
            $sql = "INSERT INTO `roles` (`nombre`, `nivel`) VALUES ('$nombre', '$nivel')";
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
    //Seleccionar__________________________________________________________________________________________________________________________________________________
    public function select()
    {
        $roles = array();
        try {
            $sql = "SELECT * FROM `roles` order by id asc";
            $result = $this->db->query($sql);
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $temp_array = array(
                        'id' => $row['id'],
                        'nombre' => $row['nombre'],
                        'nivel' => $row['nivel']
                    );
                    array_push($roles, $temp_array);
                }
                $result = setMessageArray('success', 'success');
            } else {
                $result = setMessageArray('error', 'error');
            }
        } catch (Exception $e) {
            $result = setMessageArray('error', 'error');
        }
        return $roles;
    }
    //Seleccionar Por Nombre____________________________________________________________________________________________________________________________________________
    function selectByName()
    {
        $rol = array();
        $nombre = ucfirst($this->getNombre());
        try {
            $sql = "SELECT * FROM `roles` WHERE nombre = '$nombre'";
            $result = $this->db->query($sql);
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $rol = array(
                        'id' => $row['id'],
                        'nombre' => $row['nombre'],
                        'nivel' => $row['nivel']
                    );
                }
                $result = setMessageArray('success', 'success');
            } else {
                $result = setMessageArray('error', 'error');
            }
        } catch (Exception $e) {
            $result = setMessageArray('error', 'error');
        }
        return $rol;
    }
    //Seleccionar Por Id_____________________________________________________________________________________________________________________________________________
    public function selectById()
    {
        $rol = array();
        $id = $this->getId();
        try {
            $sql = "SELECT * FROM `roles` where id = $id";
            $result = $this->db->query($sql);
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $rol = array(
                        'id' => $row['id'],
                        'nombre' => $row['nombre'],
                        'nivel' => $row['nivel']
                    );
                }
                $result = setMessageArray('success', 'success');
            } else {
                $result = setMessageArray('error', 'error');
            }
        } catch (Exception $e) {
            $result = setMessageArray('error', 'error');
        }
        return $rol;
    }
    //Actualizar_____________________________________________________________________________________________________________________________________________________
    public function update()
    {
        $id = $this->getId();
        $nombre = $this->getNombre();
        $nivel = $this->getNivel();
        try {
            $sql = "UPDATE `roles` SET `nombre` = '$nombre', `nivel` = '$nivel', editado = NOw() WHERE `id` = $id";
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
        $id = $this->getId();
        try {
            $sql = "DELETE FROM `roles` where id = $id";
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