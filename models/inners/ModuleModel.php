<?php
class ModuleModel extends ParentModel
{
    //Variables___________________________________________________________________________________________________________________________________________________
    private $descripcion;
    //___________________________________________________________________________________________________________________________________________________________
    function __construct()
    {
        parent::__construct();
    }
    //Getters y Setters___________________________________________________________________________________________________________________________________________
    public function getDescripcion()
    {
        return $this->descripcion;
    }
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $this->db->real_escape_string($descripcion);
    }
    //Seleccionar__________________________________________________________________________________________________________________________________________________
    public function select()
    {
        $modules = array();
        try {
            $sql = "SELECT * FROM `modulos` order by id asc";
            $result = $this->db->query($sql);
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $temp_array = array(
                        'id' => $row['id'],
                        'nombre' => $row['nombre'],
                        'descripcion' => $row['descripcion']
                    );
                    array_push($modules, $temp_array);
                }
                $result = setMessageArray('success', 'success');
            } else {
                $result = setMessageArray('error', 'error');
            }
        } catch (Exception $e) {
            $result = setMessageArray('error', 'error');
        }
        return $modules;
    }
    //Seleccionar Por Nombre_________________________________________________________________________________________________________________________________________
    function selectByName()
    {
        $module = array();
        $nombre = $this->getNombre();
        try {
            $sql = "SELECT * FROM `modulos` WHERE nombre = '$nombre'";
            $result = $this->db->query($sql);
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $module = array(
                        'id' => $row['id'],
                        'nombre' => $row['nombre'],
                        'descripcion' => $row['descripcion']
                    );
                }
                $result = setMessageArray('success', 'success');
            } else {
                $result = setMessageArray('error', 'error');
            }
        } catch (Exception $e) {
            $result = setMessageArray('error', 'error');
        }
        return $module;
    }
    //Cantidad_______________________________________________________________________________________________________________________________________________________
    public function quantity()
    {
        $quant = array();
        try {
            $sql = "SELECT count(`id`) as quant FROM `modulos`";
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
//_____________________________________________________________________________________________________________________________________________________________________
