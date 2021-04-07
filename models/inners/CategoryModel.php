<?php
class CategoryModel extends ParentModel
{
    //____________________________________________________________________________________________________________________________________________________________
    function __construct()
    {
        parent::__construct();
    }
    //Insertar____________________________________________________________________________________________________________________________________________________
    public function insert()
    {
        $nombre = $this->getNombre();
        try {
            $sql = "INSERT INTO `categorias` (`nombre`) VALUES ('$nombre')";
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
        $categories = array();
        try {
            $sql = "SELECT * FROM `categorias` order by nombre asc";
            $result = $this->db->query($sql);
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $temp_array = array(
                        'id' => $row['id'],
                        'nombre' => $row['nombre']
                    );
                    array_push($categories, $temp_array);
                }
                $result = setMessageArray('success', 'success');
            } else {
                $result = setMessageArray('error', 'error');
            }
        } catch (Exception $e) {
            $result = setMessageArray('error', 'error');
        }
        return $categories;
    }
    //Seleccionar Por Id_____________________________________________________________________________________________________________________________________________
    public function selectById()
    {
        $category = array();
        $id = $this->getId();
        try {
            $sql = "SELECT * FROM `categorias` where id = $id";
            $result = $this->db->query($sql);
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $category = array(
                        'id' => $row['id'],
                        'nombre' => $row['nombre']
                    );
                }
                $result = setMessageArray('success', 'success');
            } else {
                $result = setMessageArray('error', 'error');
            }
        } catch (Exception $e) {
            $result = setMessageArray('error', 'error');
        }
        return $category;
    }
    //Actualizar_____________________________________________________________________________________________________________________________________________________
    public function update()
    {
        $id = $this->getId();
        $nombre = $this->getNombre();
        try {
            $sql = "UPDATE `categorias` SET `nombre` = '$nombre', editado = NOw() WHERE `id` = $id";
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
            $sql = "DELETE FROM `categorias` where id = $id";
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
    //Cantidad_________________________________________________________________________________________________________________________________________________________
    public function quantity()
    {
        $quant = array();
        try {
            $sql = "SELECT count(`id`) as quant FROM `categorias`";
            $result = $this->db->query($sql);
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $temp_array = array(
                        'quant' => $row['quant'],
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
//____________________________________________________________________________________________________________________________________________________________________
