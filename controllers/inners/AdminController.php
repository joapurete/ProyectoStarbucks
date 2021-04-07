<?php
//Libs________________________________________________________________________________________________________________________________________________________
require_once 'controllers/InterfaceController.php';
require_once 'config/permissions.php';
require_once 'models/ParentModel.php';
require_once 'models/inners/UserModel.php';
require_once 'models/inners/ProductModel.php';
require_once 'models/inners/ModuleModel.php';
require_once 'models/inners/PermissionModel.php';
require_once 'models/inners/RolModel.php';
require_once 'models/inners/ConsultModel.php';
require_once 'models/inners/GalleryModel.php';
require_once 'models/inners/CategoryModel.php';
//____________________________________________________________________________________________________________________________________________________________
class AdminController extends Controllers implements InterfaceController
{
    public function __construct()
    {
        parent::__construct();
    }
    //Inicio___________________________________________________________________________________________________________________________________________________
    public function start()
    {
        $this->dashboard();
    }
    //Dashboard________________________________________________________________________________________________________________________________________________
    public function dashboard()
    {
    }
    //Perfil____________________________________________________________________________________________________________________________________________________
    public function profile()
    {
        $this->validateSession();
        $this->getHead();
        $this->getHeader();
        if (isset($_SESSION['user']['id'])) {
            $id = filter_var($_SESSION['user']['id'], FILTER_SANITIZE_NUMBER_INT) == false ? null : $_SESSION['user']['id'];
            if ($id == null) {
                goto error;
            }
            $this->model = new UserModel();
            $this->model->setId($id);
            $user = $this->model->selectById();
            if (!isset($user['nombre']) || !isset($user['id'])) {
                goto error;
            } else {
                $data['user'] = $user;
                $this->getBody('profileAdmin', $data, 'profile');
            }
        } else {
            error:
            $error = 'No se ha Encontrado ningun Usuario';
            echo $error;
            //aqui incluimos la pag error del admin aun no hecha
        }
        $this->getFooter();
        $this->getScripts('profile/profile');
    }
    //Editar Perfil_____________________________________________________________________________________________________________________________________________
    public function editProfile()
    {
        $this->validateSession();
        $this->getHead();
        $this->getHeader();
        if (isset($_SESSION['user']['id'])) {
            $id = filter_var($_SESSION['user']['id'], FILTER_SANITIZE_NUMBER_INT) == false ? null : $_SESSION['user']['id'];
            if ($id == null) {
                goto error;
            }
            $this->model = new UserModel();
            $this->model->setId($id);
            $user = $this->model->selectById();
            if (!isset($user['nombre']) || !isset($user['id'])) {
                goto error;
            } else {
                $this->model = new RolModel();
                $data['roles'] = $this->model->select();
                $data['user'] = $user;
                $this->getBody('editProfileAdmin', $data, 'profile');
            }
        } else {
            error:
            $error = 'No se ha Encontrado ningun Usuario';
            echo $error;
            //aqui incluimos la pag error del admin aun no hecha
        }
        $this->getFooter();
        $this->getScripts('profile/profile');
    }
    //Edit Pass________________________________________________________________________________________________________________________________________________
    public function editProfilePass()
    {
        $this->validateSession();
        $this->getHead();
        $this->getHeader();
        if (isset($_SESSION['user']['id'])) {
            $id = filter_var($_SESSION['user']['id'], FILTER_SANITIZE_NUMBER_INT) == false ? null : $_SESSION['user']['id'];
            if ($id == null) {
                goto error;
            }
            $this->model = new UserModel();
            $this->model->setId($id);
            $user = $this->model->selectById();
            if (!isset($user['nombre']) || !isset($user['id'])) {
                goto error;
            } else {
                $data['user'] = $user;
                $this->getBody('editPassAdmin', $data, 'profile');
            }
        } else {
            error:
            $error = 'No se ha Encontrado ningun Usuario';
            echo $error;
            //aqui incluimos la pag error del admin aun no hecha
        }
        $this->getFooter();
        $this->getScripts('profile/profile');
    }
    //Lista Usuarios______________________________________________________________________________________________________________________________________________
    public function listUsers()
    {
        $this->validatePermission('usuarios');
        $this->getHead();
        $this->getHeader();
        $this->model = new UserModel();
        $data['user'] = $this->model->select();
        $this->getBody('listUsers', $data, 'users');
        $this->getFooter();
        $this->getScripts('users/users');
    }
    //Nuevo Usuario_____________________________________________________________________________________________________________________________________________ 
    public function newUser()
    {
        $this->validatePermission('usuarios');
        $this->getHead();
        $this->getHeader();
        $this->model = new RolModel();
        $data['roles'] = $this->model->select();
        $this->getBody('newUser', $data, 'users');
        $this->getFooter();
        $this->getScripts('users/users');
    }
    //Editar Usuario____________________________________________________________________________________________________________________________________________
    public function editUser()
    {
        $this->validatePermission('usuarios');
        $this->getHead();
        $this->getHeader();
        if (!empty($_GET['id'])) {
            $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT) == false ? null : $_GET['id'];
            if ($id == null) {
                goto error;
            }
            $this->model = new UserModel();
            $this->model->setId($id);
            $user = $this->model->selectById();
            if (!isset($user['nombre']) || !isset($user['id'])) {
                goto error;
            } else {
                $this->model = new RolModel();
                $data['roles'] = $this->model->select();
                $data['user'] = $user;
                $this->getBody('editUser', $data, 'users');
            }
        } else {
            error:
            $error = 'No se ha Encontrado ningun Usuario';
            echo $error;
            //aqui incluimos la pag error del admin aun no hecha
        }
        $this->getFooter();
        $this->getScripts('users/users');
    }
    //Editar Usuario Pas__________________________________________________________________________________________________________________________________________
    public function editUserPass()
    {
        $this->validateSession();
        $this->getHead();
        $this->getHeader();
        if (!empty($_GET['id'])) {
            $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT) == false ? null : $_GET['id'];
            if ($id == null) {
                goto error;
            }
            $this->model = new UserModel();
            $this->model->setId($id);
            $user = $this->model->selectById();
            if (!isset($user['nombre']) || !isset($user['id'])) {
                goto error;
            } else {
                $data['user'] = $user;
                $this->getBody('editUserPass', $data, 'users');
            }
        } else {
            error:
            $error = 'No se ha Encontrado ningun Usuario';
            echo $error;
            //aqui incluimos la pag error del admin aun no hecha
        }
        $this->getFooter();
        $this->getScripts('users/users');
    }
    //Ver Usuario______________________________________________________________________________________________________________________________________________
    public function viewUser()
    {
        $this->validatePermission('usuarios');
        $this->getHead();
        $this->getHeader();
        if (!empty($_GET['id'])) {
            $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT) == false ? null : $_GET['id'];
            if ($id == null) {
                goto error;
            }
            $this->model = new UserModel();
            $this->model->setId($id);
            $user = $this->model->selectById();
            if (!isset($user['nombre']) || !isset($user['id'])) {
                goto error;
            } else {
                $data['user'] = $user;
                $this->getBody('viewUser', $data, 'users');
            }
        } else {
            error:
            $error = 'No se ha Encontrado ningun Usuario';
            echo $error;
            //aqui incluimos la pag error del admin aun no hecha
        }
        $this->getFooter();
        $this->getScripts('users/users');
    }
    //Lista Roles______________________________________________________________________________________________________________________________________________
    public function listRoles()
    {
        $this->validatePermission('roles');
        $this->getHead();
        $this->getHeader();
        $this->model = new RolModel();
        $data['roles'] = $this->model->select();
        $this->getBody('listRoles', $data, 'roles');
        $this->getFooter();
        $this->getScripts('roles/roles');
    }
    //Nuevo Rol_____________________________________________________________________________________________________________________________________________ 
    public function newRol()
    {
        $this->validatePermission('roles');
        $this->getHead();
        $this->getHeader();
        $this->model = new ModuleModel();
        $data['modules'] = $this->model->select();
        $this->getBody('newRol', $data, 'roles');
        $this->getFooter();
        $this->getScripts('roles/roles');
    }
    //Editar Rol____________________________________________________________________________________________________________________________________________
    public function editRol()
    {
        $this->validatePermission('roles');
        $this->getHead();
        $this->getHeader();
        if (!empty($_GET['id'])) {
            $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT) == false ? null : $_GET['id'];
            if ($id == null) {
                goto error;
            }
            $this->model = new RolModel();
            $this->model->setId($id);
            $rol = $this->model->selectById();
            if (!isset($rol['nombre']) || !isset($rol['id'])) {
                goto error;
            } else {
                $this->model = new PermissionModel();
                $this->model->setIdRol($id);
                $data['permissions'] = $this->model->selectByIdRol();
                if (!isset($data['permissions'])) {
                    goto error;
                } else {
                    $data['rol'] = $rol;
                    $this->getBody('editRol', $data, 'roles');
                }
            }
        } else {
            error:
            $error = 'No se ha Encontrado ningun Usuario';
            echo $error;
            //aqui incluimos la pag error del admin aun no hecha
        }
        $this->getFooter();
        $this->getScripts('roles/roles');
    }
    //Ver Rol______________________________________________________________________________________________________________________________________________
    public function viewRol()
    {
        $this->validatePermission('roles');
        $this->getHead();
        $this->getHeader();
        if (!empty($_GET['id'])) {
            $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT) == false ? null : $_GET['id'];
            if ($id == null) {
                goto error;
            }
            $this->model = new RolModel();
            $this->model->setId($id);
            $rol = $this->model->selectById();
            if (!isset($rol['nombre']) || !isset($rol['id'])) {
                goto error;
            } else {
                $this->model = new PermissionModel();
                $this->model->setIdRol($id);
                $data['permissions'] = $this->model->selectByIdRol();
                if (!isset($data['permissions'])) {
                    goto error;
                } else {
                    $data['rol'] = $rol;
                    $this->getBody('viewRol', $data, 'roles');
                }
            }
        } else {
            error:
            $error = 'No se ha Encontrado ningun Usuario';
            echo $error;
            //aqui incluimos la pag error del admin aun no hecha
        }
        $this->getFooter();
        $this->getScripts('roles/roles');
    }
    //Lista Productos_____________________________________________________________________________________________________________________________________________
    public function listProducts()
    {
        $this->validatePermission('productos');
        $this->getHead();
        $this->getHeader();
        $this->model = new ProductModel();
        $data['products'] = $this->model->select();
        $this->getBody('listProducts', $data, 'products');
        $this->getFooter();
        $this->getScripts('products/products');
    }
    //Nuevo Producto_____________________________________________________________________________________________________________________________________________ 
    public function newProduct()
    {
        $this->validatePermission('productos');
        $this->getHead();
        $this->getHeader();
        $this->model = new CategoryModel();
        $data['categories'] = $this->model->select();
        $this->getBody('newProduct', $data, 'products');
        $this->getFooter();
        $this->getScripts('products/products');
    }
    //Ver Producto_______________________________________________________________________________________________________________________________________________
    public function viewProduct()
    {
        $this->validatePermission('productos');
        $this->getHead();
        $this->getHeader();
        if (!empty($_GET['id'])) {
            $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT) == false ? null : $_GET['id'];
            if ($id == null) {
                goto error;
            }
            $this->model = new ProductModel();
            $this->model->setId($id);
            $product = $this->model->selectById();
            if (!isset($product['nombre']) || !isset($product['id'])) {
                goto error;
            } else {
                $data['product'] = $product;
                $this->getBody('viewProduct', $data, 'products');
            }
        } else {
            error:
            $error = 'No se ha Encontrado Ningun Producto';
            echo $error;
            //aqui incluimos la pag error del admin aun no hecha
        }
        $this->getFooter();
        $this->getScripts('products/products');
    }
    //Lista Categorias_____________________________________________________________________________________________________________________________________________
    public function listCategories()
    {
        $this->validatePermission('categorias');
        $this->getHead();
        $this->getHeader();
        $this->model = new CategoryModel();
        $data['categories'] = $this->model->select();
        $this->getBody('listCategories', $data, 'categories');
        $this->getFooter();
        $this->getScripts('categories/categories');
    }
    //Nueva Categoria_____________________________________________________________________________________________________________________________________________ 
    public function newCategory()
    {
        $this->validatePermission('categorias');
        $this->getHead();
        $this->getHeader();
        $this->getBody('newCategory', '', 'categories');
        $this->getFooter();
        $this->getScripts('categories/categories');
    }
    //Editar Categoria_____________________________________________________________________________________________________________________________________________
    public function editCategory()
    {
        $this->validatePermission('categorias');
        $this->getHead();
        $this->getHeader();
        if (!empty($_GET['id'])) {
            $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT) == false ? null : $_GET['id'];
            if ($id == null) {
                goto error;
            }
            $this->model = new CategoryModel();
            $this->model->setId($id);
            $category = $this->model->selectById();
            if (!isset($category['nombre']) || !isset($category['id'])) {
                goto error;
            } else {
                $data['category'] = $category;
                $this->getBody('editCategory', $data, 'categories');
            }
        } else {
            error:
            $error = 'No se ha Encontrado ninguna Categoría';
            echo $error;
            //aqui incluimos la pag error del admin aun no hecha
        }
        $this->getFooter();
        $this->getScripts('categories/categories');
    }
    //Lista Consultas_____________________________________________________________________________________________________________________________________________
    public function listConsults()
    {
        $this->validatePermission('consultas');
        $this->getHead();
        $this->getHeader();
        $this->model = new ConsultModel();
        $data['consults'] = $this->model->select();
        $this->getBody('listConsults', $data, 'consults');
        $this->getFooter();
        $this->getScripts('consults/consults');
    }
    //Ver Consulta_________________________________________________________________________________________________________________________________________________
    public function viewConsult()
    {
        $this->validatePermission('consultas');
        $this->getHead();
        $this->getHeader();
        if (!empty($_GET['id'])) {
            $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT) == false ? null : $_GET['id'];
            if ($id == null) {
                goto error;
            }
            $this->model = new ConsultModel();
            $this->model->setId($id);
            $consult = $this->model->selectById();
            if (!isset($consult['nombre']) || !isset($consult['id'])) {
                goto error;
            } else {
                $data['consult'] = $consult;
                $this->getBody('viewConsult', $data, 'consults');
            }
        } else {
            error:
            $error = 'No se ha Encontrado Ninguna Consulta';
            echo $error;
            //aqui incluimos la pag error del admin aun no hecha
        }
        $this->getFooter();
        $this->getScripts('consults/consults');
    }
    //Lista Galeria_____________________________________________________________________________________________________________________________________________
    public function listGallery()
    {
        $this->validatePermission('galeria');
        $this->getHead();
        $this->getHeader();
        $this->model = new GalleryModel();
        $data['gallery'] = $this->model->select();
        $this->getBody('listGallery', $data, 'gallery');
        $this->getFooter();
        $this->getScripts('gallery/gallery');
    }
    //Nueva Imagen Galeria______________________________________________________________________________________________________________________________________ 
    public function newGalleryImage()
    {
        $this->validatePermission('galeria');
        $this->getHead();
        $this->getHeader();
        $this->getBody('newGalleryImage', '', 'gallery');
        $this->getFooter();
        $this->getScripts('gallery/gallery');
    }
    //Info________________________________________________________________________________________________________________________________________________________
    public function getData()
    {
        $data = array(
            'index' => 'Inicio',
            'current' => 'Admin',
            'title' => 'Bienvenidos',
            'subtitle' => '',
            'link' => URL . 'Admin/start',
            'content' => ''
        );
        return $data;
    }
    //Links CSS____________________________________________________________________________________________________________________________________________________
    public function getLinkCss()
    {
        $linkCss = AutoLoadViews::getLinkOverlayScrollbar();
        $linkCss .= AutoLoadViews::getLinkAdminlte();
        $linkCss .= AutoLoadViews::getLinkDatatables();
        $linkCss .= AutoLoadViews::getLinkLightbox();
        $linkCss .= AutoLoadViews::getLinkSummerNote();
        return $linkCss;
    }
    //Scripts JS__________________________________________________________________________________________________________________________________________________
    public function getScriptJs()
    {
        $scriptJs = AutoLoadViews::getScriptOverlayScrollbar();
        $scriptJs .= AutoLoadViews::getScriptAdminlte();
        $scriptJs .= AutoLoadViews::getScriptChartJs();
        $scriptJs .= AutoLoadViews::getScriptDatatables();
        $scriptJs .= AutoLoadViews::getScriptLightbox();
        $scriptJs .= AutoLoadViews::getScriptSummerNote();
        return $scriptJs;
    }
    //Head_______________________________________________________________________________________________________________________________________________________
    public function getHead()
    {
        $data = array(
            'linkCss' => $this->getLinkCss(),
            'classBody' => "hold-transition sidebar-mini layout-fixed",
            'data' =>  $this->getData(),
        );
        $this->template->getTemplate('', 'head', $data);
    }
    //Header____________________________________________________________________________________________________________________________________________________
    public function getHeader()
    {
        $this->template->getTemplate($this, 'navbar');
    }
    //Body______________________________________________________________________________________________________________________________________________________
    public function getBody($pag = '', $params = '', $folder = '')
    {
        $this->model = new PermissionModel();
        $data['permissions'] = $this->model->select();
        $this->model = new ModuleModel();
        $data['modules'] = $this->model->select();
        $this->template->getTemplate($this, 'sidebar', $data);
        if (!empty($params)) {
            $data = $params;
        }
        if (empty($pag)) {
            $this->view->getView($this, 'admin', $data);
        } else {
            $this->view->getView($this, setViewArray($pag, $folder), $data);
        }
    }
    //Footer___________________________________________________________________________________________________________________________________________________
    public function getFooter()
    {
        $this->template->getTemplate($this, 'footer');
    }
    //Scripts JS y Ajax_______________________________________________________________________________________________________________________________________
    public function getScripts($ajax = '')
    {
        $data = array(
            'scriptJs' => $this->getScriptJs(),
            'scriptAjax' => ['ajax/admin/' . $ajax],
        );
        $this->template->getTemplate('', 'scripts', $data);
    }
    //Validación Sesión_______________________________________________________________________________________________________________________________________
    public function validateSession()
    {
        if (AutoLoadViews::validateSession() == false) {
            header('Location: ' . getUrl() . 'Index/start');
        }
    }
    //Validación Permiso______________________________________________________________________________________________________________________________________
    public function validatePermission($module = '')
    {
        $this->model = new ModuleModel();
        $this->model->setNombre(ucfirst($module));
        $module = $this->model->selectByName();
        $this->model = new PermissionModel();
        $permissions = $this->model->select();
        getPermission($permissions, $module['id']);
    }
}
