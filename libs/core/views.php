<?php
class Views
{
    //View__________________________________________________________________________________________________________________________________________________________
    public function getView($controller, $view, $data = 0)
    {
        $dir = '';
        if (!empty($controller)) {
            $controller = get_class($controller);
        }
        if (strtolower($controller) == 'admincontroller') {
            $dir = 'views/admin/inners/';
        } else if (strtolower($controller) == 'indexcontroller') {
            $dir = 'views/';
        } else {
            $dir = 'views/inners/';
        }
        if (is_array($view)) {
            $dir = $dir . $view['folder'] . '/' . $view['page'] . '.php';
        } else {
            $dir = $dir . $view . '.php';
        }
        require_once($dir);
    }
}
//__________________________________________________________________________________________________________________________________________________________________
