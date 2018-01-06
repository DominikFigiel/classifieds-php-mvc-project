<?php

namespace Controllers;

class User extends Controller
{

    public function index()
    {
        $accessController = new \Controllers\Access();
        $accessController->islogin();
        $modelUser = $this->getModel('User');
        $user_id = $modelUser->getIdByLogin(\Tools\Access::get(\Tools\Access::$login));
        if ($user_id != 1)
            $this->redirect('access/logform');

        //tworzy obiekt widoku i zleca wyświetlenie
        //wszystkich użytkowników w widoku
        $view = $this->getView('User');
        if (!$view || !$view->index())
            $this->redirect('errors/404.html');
    }

    public function add()
    {
        $view = $this->getView('User');
        if ($view)
            $view->add();
        else
            $this->redirect('errors/404.html');
    }

    public function edit($id = null)
    {
        $accessController = new \Controllers\Access();
        $accessController->islogin();

        if ($id !== null) {
            $view = $this->getView('User');
            if ($view)
                $view->edit($id);
            else
                $this->redirect('errors/404.html');
        } else
            $this->redirect('users/');
    }

    //dodaje do bazy kategorię
    public function insert()
    {
        //za operację na bazie danych odpowiedzialny jest model
        //tworzymy obiekt modelu i zlecamy dodanie użytkownika
        $model = $this->getModel('User');
        if ($model) {
            $model->insert($_POST['name'], $_POST['surname'], $_POST['login'], $_POST['password']);
            $this->redirect('access/logform');
        } else
            $this->redirect('errors/404.html');
    }

    public function update()
    {
        $accessController = new \Controllers\Access();
        $accessController->islogin();

        $model = $this->getModel('User');
        $data = $model->update($_POST['id'], $_POST['name'], $_POST['surname'], $_POST['login'], $_POST['password']);
        if (isset($data['error']))
            \Tools\Session::set('error', $data['error']);
        if (isset($data['message']))
            \Tools\Session::set('message', $data['message']);
        $this->redirect('users/');
    }

    public function delete($id)
    {
        $accessController = new \Controllers\Access();
        $accessController->islogin();

        $model = $this->getModel('User');
        $data = $model->delete($id);
        if (isset($data['error']))
            \Tools\Session::set('error', $data['error']);
        if (isset($data['message']))
            \Tools\Session::set('message', $data['message']);
        $this->redirect('users/');
    }

    public function getAll()
    {
        $accessController = new \Controllers\Access();
        $accessController->islogin();

        $view = $this->getView('User');
        $data = null;
        if (\Tools\Session::is('message'))
            $data['message'] = \Tools\Session::get('message');
        if (\Tools\Session::is('error'))
            $data['error'] = \Tools\Session::get('error');
        $view->getAll($data);
        \Tools\Session::clear('message');
        \Tools\Session::clear('error');
    }

}