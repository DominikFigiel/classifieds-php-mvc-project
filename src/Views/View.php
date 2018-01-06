<?php

namespace Views;

use \Smarty;

abstract class View
{
    protected $smarty;

    public function __construct()
    {
        $this->smarty = new Smarty();
        $this->set('subdir', '/' . \Config\Website\Config::$subdir);
        if (\Tools\Access::islogin() === true) {
            $this->set('login', true);
            $this->set('user_login', \Tools\Access::get(\Tools\Access::$login));

            $model = $this->getModel('User');
            $user_id = $model->getIdByLogin(\Tools\Access::get(\Tools\Access::$login));
            $this->set('user_id', $user_id);
        }

    }

    //załadowanie modelu
    public function getModel($name)
    {
        $name = 'Models\\' . $name;
        return new $name();
    }

    //załadowanie i zrenderowanie szablonu
    public function render($name)
    {
        $path = 'templates' . DIRECTORY_SEPARATOR;
        $path .= $name . '.html.php';
        try {
            if (is_file($path)) {
                $this->smarty->display($path);
            } else {
                throw new \Exception('Nie można załączyć szablonu ' . $name . ' z: ' . $path);
            }
        } catch (\Exception $e) {
            echo "Błąd 404: Nie odnaleziono szablonu!";
            exit;
        }
    }

    public function set($name, $value)
    {
        $this->smarty->assign($name, $value);
    }

    public function get($name)
    {
        if (isset($this->$name))
            return $this->$name;
    }
}


