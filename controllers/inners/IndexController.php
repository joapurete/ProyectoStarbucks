<?php
//Libs________________________________________________________________________________________________________________________________________________________
require_once 'controllers/InterfaceController.php';
//____________________________________________________________________________________________________________________________________________________________
class IndexController extends Controllers implements InterfaceController
{
    public function __construct()
    {
        parent::__construct();
    }
    //Inicio___________________________________________________________________________________________________________________________________________________
    public function start()
    {
        $this->getHead();
        $this->getHeader();
        $this->getBody('index');
        $this->getFooter();
        $this->getScripts();
    }
    //Info________________________________________________________________________________________________________________________________________________________
    public function getData()
    {
        $data = array(
            'index' => 'Inicio',
            'current' => 'Inicio',
            'title' => 'Bienvenidos',
            'subtitle' => '',
            'link' => URL . 'Index/start',
            'content' => ''
        );
        return $data;
    }
    //Links CSS____________________________________________________________________________________________________________________________________________________
    public function getLinkCss()
    {
        $linkCss = AutoLoadViews::getLinkSlick();
        $linkCss .= AutoLoadViews::getLinkLightbox();
        return $linkCss;
    }
    //Scripts JS__________________________________________________________________________________________________________________________________________________
    public function getScriptJs()
    {
        $scriptJs = AutoLoadViews::getScriptSlick();
        $scriptJs .= AutoLoadViews::getScriptLightbox();
        $scriptJs .= AutoLoadViews::getScriptMagicLine();
        $scriptJs .= AutoLoadViews::getScriptTypeit();
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
        AutoLoadViews::getTemplateGeneral();
    }
    //Body______________________________________________________________________________________________________________________________________________________
    public function getBody($pag = '')
    {
        $this->view->getView($this, $pag, $this->getData());
    }
    //Footer___________________________________________________________________________________________________________________________________________________
    public function getFooter()
    {
        $this->template->getTemplate('', 'footer');
    }
    //Scripts JS y Ajax_______________________________________________________________________________________________________________________________________
    public function getScripts()
    {
        $data = array(
            'scriptJs' => $this->getScriptJs(),
            'scriptAjax' => null
        );
        $this->template->getTemplate('', 'scripts', $data);
    }
}
