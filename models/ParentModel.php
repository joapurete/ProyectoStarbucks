<?php
class ParentModel
{
    //Variables___________________________________________________________________________________________________________________________________________________
    protected $db;
    protected $id;
    protected $nombre;
    protected $creado;
    protected $editado;
    //____________________________________________________________________________________________________________________________________________________________
    public function __construct()
    {
        $this->db = DB::connect();
    }
    //Getters y Setters___________________________________________________________________________________________________________________________________________
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $this->db->real_escape_string($id);
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $this->db->real_escape_string($nombre);
    }
    /* public function getCreado()
    {
        return $this->creado;
    }
    public function setCreado($creado)
    {
        $this->creado = $this->bd->real_escape_string($creado);
    }
    public function getEditado()
    {
        return $this->editado;
    }
    public function setEditado($editado)
    {
        $this->editado = $this->bd->real_escape_string($editado);
    } */
}
//________________________________________________________________________________________________________________________________________________________________
