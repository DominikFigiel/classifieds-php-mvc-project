<?php

namespace Controllers;
//kontroler do obsługi logowania
//każda metoda odpowiada jednej akcji możliwej
//do wykonania przez kontroler
class Access extends Controller
{
    //wyświetla formularz do logowania
    public function login()
    {
        $model = $this->getModel('Access');
        //
        $modelUser = $this->getModel('User');
        $data = $modelUser->getOneByLogin($_POST['login']);
        if (isset($data['users'][0])) {
            $dblogin = $data['users'][0]['login'];
            $dbpassword = $data['users'][0]['password'];
            $data = $model->login($_POST['login'], md5($_POST['password']), $dblogin, $dbpassword);
        }

        if (!isset($data['error']))
            $this->redirect('');
        else
            $this->logform($data);
    }

    //zalogowuje do systemu

    public function logform($data = null)
    {
        if (\Tools\Session::is('message'))
            $data['message'] = \Tools\Session::get('message');
        if (\Tools\Session::is('error'))
            $data['error'] = \Tools\Session::get('error');
        $view = $this->getView('Access');
        $view->logform($data);
        \Tools\Session::clear('message');
        \Tools\Session::clear('error');
    }

    //wylogowuje z systemu

    public function logout()
    {
        $model = $this->getModel('Access');
        $model->logout();
        $this->redirect('');
    }

    public function islogin()
    {
        if (\Tools\Access::islogin() !== true) {
            \Tools\Session::set('message', \Config\Website\MessageName::$mustlogin);
            $this->redirect('access/logform');
        }
    }
}
