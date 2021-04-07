<?php
class ConsultModel extends ParentModel
{
    //Variables___________________________________________________________________________________________________________________________________________________
    private $apellido;
    private $mail;
    private $tel;
    private $consulta;
    //____________________________________________________________________________________________________________________________________________________________
    function __construct()
    {
        parent::__construct();
    }
    //Getters y Setters___________________________________________________________________________________________________________________________________________
    public function getApellido()
    {
        return $this->apellido;
    }
    public function setApellido($apellido)
    {
        $this->apellido = $this->db->real_escape_string($apellido);
    }
    public function getMail()
    {
        return $this->mail;
    }
    public function setMail($mail)
    {
        $this->mail = $this->db->real_escape_string($mail);
    }
    public function getTel()
    {
        return $this->tel;
    }
    public function setTel($tel)
    {
        $this->tel = $this->db->real_escape_string($tel);
    }
    public function getConsulta()
    {
        return $this->consulta;
    }
    public function setConsulta($consulta)
    {
        $this->consulta = $this->db->real_escape_string($consulta);
    }
    //Seleccionar___________________________________________________________________________________________________________________________________________________
    public function select()
    {
        $consults = array();
        try {
            $sql = "SELECT * FROM `consultas`";
            $result = $this->db->query($sql);
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $temp_array = array(
                        'id' => $row['id'],
                        'nombre' => $row['nombre'],
                        'apellido' => $row['apellido'],
                        'mail' => $row['mail'],
                        'telefono' => $row['telefono'],
                        'creado' => $row['creado'],
                    );
                    array_push($consults, $temp_array);
                }
                $result = setMessageArray('success', 'success');
            } else {
                $result = setMessageArray('error', 'error');
            }
        } catch (Exception $e) {
            $result = setMessageArray('error', 'error');
        }
        return $consults;
    }
    //Seleccionar Por Id___________________________________________________________________________________________________________________________________________
    public function selectById()
    {
        $id = $this->getId();
        $consult = [];
        try {
            $sql = "SELECT * FROM `consultas` WHERE id = $id";
            $result = $this->db->query($sql);
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $consult = array(
                        'id' => $row['id'],
                        'nombre' => $row['nombre'],
                        'apellido' => $row['apellido'],
                        'mail' => $row['mail'],
                        'telefono' => $row['telefono'],
                        'creado' => $row['creado'],
                        'consulta' => $row['consulta'],
                    );
                }
                $result = setMessageArray('success', 'success');
            } else {
                $result = setMessageArray('error', 'error');
            }
        } catch (Exception $e) {
            $result = setMessageArray('error', 'error');
        }
        return $consult;
    }
    //Seleccionar Por Limite______________________________________________________________________________________________________________________________________
    public function selectByLimit($limit = 5)
    {
        $consults = array();
        try {
            $sql = "SELECT * FROM `consultas` LIMIT $limit";
            $result = $this->db->query($sql);
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $temp_array = array(
                        'id' => $row['id'],
                        'nombre' => $row['nombre'],
                        'apellido' => $row['apellido'],
                        'consulta' => $row['consulta'],
                        'creado' => $row['creado'],
                    );
                    array_push($consults, $temp_array);
                }
                $result = setMessageArray('success', 'success');
            } else {
                $result = setMessageArray('error', 'error');
            }
        } catch (Exception $e) {
            $result = setMessageArray('error', 'error');
        }
        return $consults;
    }
    //Insertar_____________________________________________________________________________________________________________________________________________________
    public function insert()
    {
        $nombre = $this->getNombre();
        $apellido = $this->getApellido();
        $mail = $this->getMail();
        $telefono = $this->getTel();
        $consulta = $this->getConsulta();
        try {
            $sql = "INSERT INTO `consultas` (`nombre`, `apellido`, `mail`, `telefono`, `consulta`) VALUES ('$nombre', '$apellido', '$mail', '$telefono', '$consulta')";
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
    //Eliminar_____________________________________________________________________________________________________________________________________________________
    public function delete()
    {
        $id = $this->getId();
        try {
            $sql = "DELETE FROM `consultas` where id = $id";
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
//______________________________________________________________________________________________________________________________________________________________________