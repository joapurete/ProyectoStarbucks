<?php
class UserModel extends ParentModel
{
    //Variables___________________________________________________________________________________________________________________________________________________
    private $apellido;
    private $idRol;
    private $mail;
    private $tel;
    private $foto;
    private $password;
    private $idDomicilio;
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
    public function getIdRol()
    {
        return $this->idRol;
    }
    public function setIdRol($idRol)
    {
        $this->idRol = $this->db->real_escape_string($idRol);
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
    public function getFoto()
    {
        return $this->foto;
    }
    public function setFoto($foto)
    {
        $this->foto = $this->db->real_escape_string($foto);
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        $this->password = $this->db->real_escape_string($password);
    }
    public function getIdDomicilio()
    {
        return $this->idDomicilio;
    }
    public function setIdDomicilio($idDomicilio)
    {
        $this->idDomicilio = $this->db->real_escape_string($idDomicilio);
    }
    //Login_______________________________________________________________________________________________________________________________________________________
    public function login()
    {
        $user = array();
        $mail = $this->getMail();
        try {
            $sql = "SELECT usuarios.*, roles.nombre as nombreRol, roles.nivel as nivelRol FROM `usuarios` inner join roles on usuarios.idRol = roles.id WHERE usuarios.mail = '$mail'";
            $result = $this->db->query($sql);
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $user = array(
                        'id' => $row['id'],
                        'nombre' => $row['nombre'],
                        'apellido' => $row['apellido'],
                        'idRol' => $row['idRol'],
                        'nombreRol' => $row['nombreRol'],
                        'nivelRol' => $row['nivelRol'],
                        'mail' => $row['mail'],
                        'tel' => $row['telefono'],
                        'foto' => $row['fotoPerfil'],
                        'password' => $row['password'],
                        'idDomicilio' => $row['idDomicilio'],
                    );
                }
                $result = setMessageArray('success', 'success');
            } else {
                $result = setMessageArray('error', 'error');
            }
        } catch (Exception $e) {
            $result = setMessageArray('error', 'error');
        }
        return $user;
    }
    //Login Por Cookie_____________________________________________________________________________________________________________________________________________
    public function loginByCookie()
    {
        $user = array();
        $mail = $this->getMail();
        $id = $this->getId();
        try {
            $sql = "SELECT usuarios.*, roles.nombre as nombreRol, roles.nivel as nivelRol FROM `usuarios` inner join roles on usuarios.idRol = roles.id WHERE usuarios.mail = '$mail' and usuarios.id = '$id'";
            $result = $this->db->query($sql);
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $user = array(
                        'id' => $row['id'],
                        'nombre' => $row['nombre'],
                        'apellido' => $row['apellido'],
                        'idRol' => $row['idRol'],
                        'nombreRol' => $row['nombreRol'],
                        'nivelRol' => $row['nivelRol'],
                        'mail' => $row['mail'],
                        'tel' => $row['telefono'],
                        'foto' => $row['fotoPerfil'],
                        'password' => $row['password'],
                        'idDomicilio' => $row['idDomicilio'],
                    );
                }
                $result = setMessageArray('success', 'success');
            } else {
                $result = setMessageArray('error', 'error');
            }
        } catch (Exception $e) {
            $result = setMessageArray('error', 'error');
        }
        return $user;
    }
    //Insertar____________________________________________________________________________________________________________________________________________________
    public function insert()
    {
        $nombre = $this->getNombre();
        $apellido = $this->getApellido();
        $idRol = $this->getIdRol();
        $mail = $this->getMail();
        $tel = $this->getTel();
        $password = $this->getPassword();
        $foto = $this->getFoto() == '' ? NULL : $this->getFoto();
        try {
            $sql = "INSERT INTO `usuarios` (`nombre`, `apellido`, `idRol`, `fotoPerfil`, `mail`, `telefono`, `password`) VALUES ('$nombre', '$apellido', '$idRol', '$foto', '$mail', '$tel', '$password')";
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
    public function select()
    {
        $users = array();
        try {
            $sql = "SELECT usuarios.*, roles.nombre as nombreRol, roles.nivel as nivelRol FROM `usuarios` inner join roles on usuarios.idRol = roles.id order by usuarios.id asc";
            $result = $this->db->query($sql);
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $temp_array = array(
                        'id' => $row['id'],
                        'nombre' => $row['nombre'],
                        'apellido' => $row['apellido'],
                        'idRol' => $row['idRol'],
                        'nombreRol' => $row['nombreRol'],
                        'nivelRol' => $row['nivelRol'],
                        'mail' => $row['mail'],
                        'tel' => $row['telefono'],
                        'foto' => $row['fotoPerfil'],
                        'password' => $row['password'],
                        'idDomicilio' => $row['idDomicilio'],
                    );
                    array_push($users, $temp_array);
                }
                $result = setMessageArray('success', 'success');
            } else {
                $result = setMessageArray('error', 'error');
            }
        } catch (Exception $e) {
            $result = setMessageArray('error', 'error');
        }
        return $users;
    }
    //Seleccionar Por Id___________________________________________________________________________________________________________________________________________
    public function selectById()
    {
        $user = array();
        $id = $this->getId();
        try {
            $sql = "SELECT usuarios.*, roles.nombre as nombreRol, roles.nivel as nivelRol FROM `usuarios` inner join roles on usuarios.idRol = roles.id WHERE usuarios.id = $id";
            $result = $this->db->query($sql);
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $user = array(
                        'id' => $row['id'],
                        'nombre' => $row['nombre'],
                        'apellido' => $row['apellido'],
                        'idRol' => $row['idRol'],
                        'nombreRol' => $row['nombreRol'],
                        'nivelRol' => $row['nivelRol'],
                        'mail' => $row['mail'],
                        'tel' => $row['telefono'],
                        'foto' => $row['fotoPerfil'],
                        'password' => $row['password'],
                        'idDomicilio' => $row['idDomicilio'],
                    );
                }
                $result = setMessageArray('success', 'success');
            } else {
                $result = setMessageArray('error', 'error');
            }
        } catch (Exception $e) {
            $result = setMessageArray('error', 'error');
        }
        return $user;
    }
    //Actualizar____________________________________________________________________________________________________________________________________________________
    public function update()
    {
        $id = $this->getId();
        $nombre = $this->getNombre();
        $apellido = $this->getApellido();
        $mail = $this->getMail();
        $tel = $this->getTel();
        $foto = $this->getFoto() == '' ? NULL : $this->getFoto();
        try {
            $sql = "UPDATE `usuarios` SET `nombre` = '$nombre', `apellido` = '$apellido', `fotoPerfil` = '$foto', `mail` = '$mail', `telefono` = '$tel', editado = NOw() WHERE `id` = $id";
            $result = $this->db->query($sql);
            if ($result) {
                $result = setMessageArray('success', 'success');
            } else {
                $result = setMessageArray('error', 'error', $sql);
            }
        } catch (Exception $e) {
            $result = setMessageArray('error', 'error', $sql);
        }
        return $result;
    }
    //Actualizar Rol________________________________________________________________________________________________________________________________________________
    public function updateRol()
    {
        $id = $this->getId();
        $idRol = $this->getIdRol();
        try {
            $sql = "UPDATE `usuarios` SET `idRol` = '$idRol', editado = NOw() WHERE `id` = $id";
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
    //Actualizar Mail________________________________________________________________________________________________________________________________________________
    public function updateMail()
    {
        $id = $this->getId();
        $mail = $this->getMail();
        try {
            $sql = "UPDATE `usuarios` SET `mail` = '$mail', editado = NOw() WHERE `id` = $id";
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
    //Actualizar Contraseña__________________________________________________________________________________________________________________________________________
    public function updatePass()
    {
        $id = $this->getId();
        $password = $this->getPassword();
        try {
            $sql = "UPDATE `usuarios` SET `password` = '$password', editado = NOw() WHERE `id` = $id";
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
            $sql = "DELETE FROM `usuarios` where id = $id";
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
    //Cantidad Por Rol_________________________________________________________________________________________________________________________________________________
    public function quantityByRol()
    {
        $quant = array();
        $idRol = $this->getIdRol();
        try {
            $sql = "SELECT count(`id`) as quant FROM `usuarios` WHERE idRol = $idRol";
            $result = $this->db->query($sql);
            if ($result) {
                while ($qn = $result->fetch_assoc()) {
                    $temp_array = array(
                        'quant' => $qn['quant'],
                    );
                    array_push($quant, $temp_array);
                }
                $result = setMessageArray('success', 'success');
            } else {
                $result = setMessageArray('error', 'error');
            }
        } catch (Exception $e) {
            $result = setMessageArray('error', 'error');
        }
        return $quant;
    }
}
//______________________________________________________________________________________________________________________________________________________________________
