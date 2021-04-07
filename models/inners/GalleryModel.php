<?php
class GalleryModel extends ParentModel
{
    //Variables___________________________________________________________________________________________________________________________________________________
    private $foto;
    //____________________________________________________________________________________________________________________________________________________________
    function __construct()
    {
        parent::__construct();
    }
    //Getters y Setters___________________________________________________________________________________________________________________________________________
    public function getFoto()
    {
        return $this->foto;
    }
    public function setFoto($foto)
    {
        $this->foto = $this->db->real_escape_string($foto);
    }
    //Seleccionar___________________________________________________________________________________________________________________________________________________
    public function select()
    {
        $gallery = array();
        try {
            $sql = "SELECT * FROM `galeria`";
            $result = $this->db->query($sql);
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $temp_array = array(
                        'id' => $row['id'],
                        'foto' => $row['foto']
                    );
                    array_push($gallery, $temp_array);
                }
                $result = setMessageArray('success', 'success');
            } else {
                $result = setMessageArray('error', 'error');
            }
        } catch (Exception $e) {
            $result = setMessageArray('error', 'error');
        }
        return $gallery;
    }
    //Seleccionar Por Limite_________________________________________________________________________________________________________________________________________
    public function selectBylimit($limit = 10)
    {
        $gallery = array();
        try {
            $sql = "SELECT * FROM `galeria` order by rand() limit $limit";
            $result = $this->db->query($sql);
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $temp_array = array(
                        'id' => $row['id'],
                        'foto' => $row['foto'],
                    );
                    array_push($gallery, $temp_array);
                }
                $result = setMessageArray('success', 'success');
            } else {
                $result = setMessageArray('error', 'error');
            }
        } catch (Exception $e) {
            $result = setMessageArray('error', 'error');
        }
        return $gallery;
    }
    //Insertar_________________________________________________________________________________________________________________________________________________________
    public function insert()
    {
        $foto = $this->getFoto();
        try {
            $sql = "INSERT INTO `galeria` (`foto`) VALUES ('$foto')";
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
            $sql = "DELETE FROM `galeria` where id = $id";
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
    //Cantidad_____________________________________________________________________________________________________________________________________________________________
    public function quantity()
    {
        $quant = array();
        try {
            $sql = "SELECT count(`id`) as quant FROM `galeria`";
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
//____________________________________________________________________________________________________________________________________________________________________________
