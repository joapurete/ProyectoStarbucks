<?php
//Libs________________________________________________________________________________________________________________________________________________________
require_once 'controllers/InterfaceController.php';
//____________________________________________________________________________________________________________________________________________________________
class LoginController extends Controllers implements InterfaceController
{
    public function __construct()
    {
        parent::__construct();
    }
    //Inicio___________________________________________________________________________________________________________________________________________________
    public function start()
    {
        $this->validateSession();
        $this->getHead();
        $this->getHeader();
        $this->getBody('login');
        $this->getFooter();
        $this->getScripts();
    }
    //Info________________________________________________________________________________________________________________________________________________________
    public function getData()
    {
        $data = array(
            'index' => 'Inicio',
            'current' => 'Login',
            'title' => 'Bienvenidos',
            'subtitle' => '',
            'link' => URL . 'Login/start',
            'content' => ''
        );
        return $data;
    }
    //Links CSS____________________________________________________________________________________________________________________________________________________
    public function getLinkCss()
    {
        $linkCss = AutoLoadViews::getLinkOverlayScrollbar();
        return $linkCss;
    }
    //Scripts JS__________________________________________________________________________________________________________________________________________________
    public function getScriptJs()
    {
        $scriptJs = AutoLoadViews::getScriptOverlayScrollbar();
        return $scriptJs;
    }
    //Head_______________________________________________________________________________________________________________________________________________________
    public function getHead()
    {
        $data = array(
            'linkCss' => $this->getLinkCss(),
            'data' =>  $this->getData()
        );
        $this->template->getTemplate($this, 'head', $data);
    }
    //Header____________________________________________________________________________________________________________________________________________________
    public function getHeader()
    {
        $this->template->getTemplate($this, 'header');
    }
    //Body______________________________________________________________________________________________________________________________________________________
    public function getBody($pag = '')
    {
        AutoLoadViews::getTemplateGeneral();
        $this->view->getView($this, $pag, $this->getData());
    }
    //Footer___________________________________________________________________________________________________________________________________________________
    public function getFooter()
    {
        $this->template->getTemplate($this, 'footer');
    }
    //Scripts JS y Ajax_______________________________________________________________________________________________________________________________________
    public function getScripts()
    {
        $data = array(
            'scriptJs' => $this->getScriptJs(),
            'scriptAjax' => ['ajax/login/login'],
        );
        $this->template->getTemplate($this, 'scripts', $data);
    }
    //Validación Sesión_______________________________________________________________________________________________________________________________________
    public function validateSession()
    {
        if (AutoLoadViews::validateSession()) {
            header('Location: ' . getUrl() . 'Index/start');
        }
    }
}
