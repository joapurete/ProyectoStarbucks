<?php
class ProductModel extends ParentModel
{
    //Variables___________________________________________________________________________________________________________________________________________________
    private $idCategoria;
    private $precio;
    private $descripcion;
    private $stock;
    private $fotoPrincipal;
    private $fotoSecundaria;
    private $status;
    //____________________________________________________________________________________________________________________________________________________________
    function __construct()
    {
        parent::__construct();
    }
    //Getters y Setters___________________________________________________________________________________________________________________________________________
    public function getIdCategoria()
    {
        return $this->idCategoria;
    }
    public function setIdCategoria($idCategoria)
    {
        $this->idCategoria = $this->db->real_escape_string($idCategoria);
    }
    public function getPrecio()
    {
        return $this->precio;
    }
    public function setPrecio($precio)
    {
        $this->precio = $this->db->real_escape_string($precio);
    }
    public function getDescripcion()
    {
        return $this->descripcion;
    }
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $this->db->real_escape_string($descripcion);
    }
    public function getStock()
    {
        return $this->stock;
    }
    public function setStock($stock)
    {
        $this->stock = $this->db->real_escape_string($stock);
    }
    public function getFotoPrincipal()
    {
        return $this->fotoPrincipal;
    }
    public function setFotoPrincipal($fotoPrincipal)
    {
        $this->fotoPrincipal = $this->db->real_escape_string($fotoPrincipal);
    }
    public function getFotoSecundaria()
    {
        return $this->fotoSecundaria;
    }
    public function setFotoSecundaria($fotoSecundaria)
    {
        $this->fotoSecundaria = $this->db->real_escape_string($fotoSecundaria);
    }
    public function getStatus()
    {
        return $this->status;
    }
    public function setStatus($status)
    {
        $this->status = $this->db->real_escape_string($status);
    }
    //Insertar______________________________________________________________________________________________________________________________________________________
    public function insert()
    {
        $nombre = $this->getNombre();
        $idCategoria = $this->getIdCategoria();
        $precio = $this->getPrecio();
        $descripcion = $this->getDescripcion() == '' ? NULL : $this->getDescripcion();
        $stock = $this->getStock();
        $foto = $this->getFotoPrincipal() == '' ? NULL : $this->getFotoPrincipal();
        $fotoSecundaria = $this->getFotoSecundaria() == '' ? NULL : $this->getFotoSecundaria();
        $status = $this->getStatus();
        try {
            $sql = "INSERT INTO `productos` (`nombre`, `idCategoria`, `precio`, `descripcion`, `stock`, `fotoPrincipal`, `fotoSecundaria`, `status`) VALUES ('$nombre', '$idCategoria', '$precio', '$descripcion', '$stock', '$foto', '$fotoSecundaria', '$status')";
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
    //Seleccionar_____________________________________________________________________________________________________________________________________________________
    public function select()
    {
        $products = array();
        try {
            $sql = "SELECT productos.*, categorias.nombre as categoria FROM `productos` inner join categorias on productos.idCategoria = categorias.id order by productos.nombre asc";
            $result = $this->db->query($sql);
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $temp_array = array(
                        'id' => $row['id'],
                        'nombre' => $row['nombre'],
                        'idCategoria' => $row['idCategoria'],
                        'categoria' => $row['categoria'],
                        'precio' => $row['precio'],
                        'descripcion' => $row['descripcion'],
                        'stock' => $row['stock'],
                        'foto' => $row['fotoPrincipal'],
                        'fotoSecundaria' => $row['fotoSecundaria'],
                        'status' => $row['status']
                    );
                    array_push($products, $temp_array);
                }
                $result = setMessageArray('success', 'success');
            } else {
                $result = setMessageArray('error', 'error');
            }
        } catch (Exception $e) {
            $result = setMessageArray('error', 'error');
        }
        return $products;
    }
    //Seleccionar Por Id________________________________________________________________________________________________________________________________________________
    public function selectById()
    {
        $product = array();
        $id = $this->getId();
        try {
            $sql = "SELECT productos.*, categorias.nombre as categoria FROM `productos` inner join categorias on productos.idCategoria = categorias.id WHERE productos.id = $id";
            $result = $this->db->query($sql);
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $product = array(
                        'id' => $row['id'],
                        'nombre' => $row['nombre'],
                        'idCategoria' => $row['idCategoria'],
                        'categoria' => $row['categoria'],
                        'precio' => $row['precio'],
                        'descripcion' => $row['descripcion'],
                        'stock' => $row['stock'],
                        'foto' => $row['fotoPrincipal'],
                        'fotoSecundaria' => $row['fotoSecundaria'],
                        'status' => $row['status']
                    );
                }
                $result = setMessageArray('success', 'success');
            } else {
                $result = setMessageArray('error', 'error');
            }
        } catch (Exception $e) {
            $result = setMessageArray('error', 'error');
        }
        return $product;
    }
    //Actualizar____________________________________________________________________________________________________________________________________________________
    public function update()
    {
        $id = $this->getId();
        $nombre = $this->getNombre();
        $idCategoria = $this->getIdCategoria();
        $precio = $this->getPrecio();
        $descripcion = $this->getDescripcion() == '' ? NULL : $this->getDescripcion();
        $stock = $this->getStock();
        $foto = $this->getFotoPrincipal() == '' ? NULL : $this->getFotoPrincipal();
        $fotoSecundaria = $this->getFotoSecundaria() == '' ? NULL : $this->getFotoSecundaria();
        $status = $this->getStatus();
        try {
            $sql = "UPDATE `productos` SET `nombre` = '$nombre', `idCategoria` = '$idCategoria', `precio` = '$precio', `descripcion` = '$descripcion', `stock` = '$stock', `fotoPrincipal` = '$foto', `fotoSecundaria` = '$fotoSecundaria', `status` = '$status',  editado = NOw() WHERE `id` = $id";
            $result = $this->db->query($sql);
            if ($result) {
                $result = setMessageArray('success', 'success');
            } else {
                $result = setMessageArray('error', 'error', $sql);
            }
        } catch (Exception $e) {
            $result = setMessageArray('error', 'error'. 'rr');
        }
        return $result;
    }
    //Eliminar_______________________________________________________________________________________________________________________________________________________
    public function delete()
    {
        $id = $this->getId();
        try {
            $sql = "DELETE FROM `productos` where id = $id";
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
    //Cantidad Por Categoria_____________________________________________________________________________________________________________________________________________
    public function quantityByCategory()
    {
        $quant = array();
        $idCategoria = $this->getIdCategoria();
        try {
            $sql = "SELECT count(`id`) as quant FROM `productos` WHERE idCategoria = $idCategoria";
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