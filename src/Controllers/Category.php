<?php

namespace Controllers;

class Category extends Controller
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
        //wszystkich kategorii w widoku
        $view = $this->getView('Category');
        if (!$view || !$view->index())
            $this->redirect('errors/404.html');
    }

    public function add()
    {
        $view = $this->getView('Category');
        if ($view)
            $view->add();
        else
            $this->redirect('errors/404.html');
    }

    public function edit($id = null)
    {
        if ($id !== null) {
            $view = $this->getView('Category');
            if ($view)
                $view->edit($id);
            else
                $this->redirect('errors/404.html');
        } else
            $this->redirect('categories/');
    }

    //dodaje do bazy kategorię
    public function insert()
    {
        //za operację na bazie danych odpowiedzialny jest model
        //tworzymy obiekt modelu i zlecamy dodanie kategorii
        $model = $this->getModel('Category');
        if ($model) {
            $model->insert($_POST['name']);
            $this->redirect('categories/');
        } else
            $this->redirect('errors/404.html');
    }

    public function update()
    {
        $model = $this->getModel('Category');
        $data = $model->update($_POST['id'], $_POST['name']);
        if (isset($data['error']))
            \Tools\Session::set('error', $data['error']);
        if (isset($data['message']))
            \Tools\Session::set('message', $data['message']);
        $this->redirect('categories/');
    }

    public function delete($id)
    {
        if ($id !== null) {
            //za operację na bazie danych odpowiedzialny jest model
            //tworzymy obiekt modelu i zlecamy usunięcie kategorii
            $model = $this->getModel('Category');
            if ($model)
                $model->delete($id);
            else
                $this->redirect('errors/404.html');
        }
        $this->redirect('categories/');
    }

}
