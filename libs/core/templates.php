<?php
class Templates
{
    //Template______________________________________________________________________________________________________________________________________________________
    public function getTemplate($controller = '', $template, $data = 0)
    {
        if (!empty($controller)) {
            $controller = get_class($controller);
        }
        if (strtolower($controller) == 'admincontroller') {
            $template = 'views/admin/templates/' . $template . '.php';
        } else {
            $template = 'views/templates/' . $template . '.php';
        }
        require_once($template);
    }
}
//__________________________________________________________________________________________________________________________________________________________________