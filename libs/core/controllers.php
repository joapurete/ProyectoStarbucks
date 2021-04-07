<?php
class Controllers
{
    //MVC__________________________________________________________________________________________________________________________________________________________
    public function __construct()
    {
        $this->view = new Views();
        $this->template = new Templates();
        $this->getModel();
    }
    //Model________________________________________________________________________________________________________________________________________________________
    public function getModel()
    {
        $model = get_class($this) . 'Model';
        $model = str_replace('Controller', '', $model);
        $dirClass = 'models/inners/' . $model . '.php';
        if (file_exists($dirClass)) {
            require_once 'models/ParentModel.php';
            require_once($dirClass);
            $this->$model = new $model();
        }
    }
}
//__________________________________________________________________________________________________________________________________________________________________
