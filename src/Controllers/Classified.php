<?php

namespace Controllers;

class Classified extends Controller
{

    public function index()
    {
        //tworzy obiekt widoku i zleca wyświetlenie
        //wszystkich ogloszen w widoku
        $view = $this->getView('Classified');
        if (!$view || !$view->index())
            $this->redirect('errors/404.html');
    }

    public function indexOfUsersClassifieds($id = NULL)
    {
        $view = $this->getView('Classified');
        if ($view) {
            if ($id != NULL)
                $view->indexOfUsersClassifieds($id);
            else
                $view->indexOfUsersClassifieds();
        } else
            $this->redirect('errors/404.html');
    }

    public function search()
    {
        if (isset($_POST['id']) && $_POST['id'] != null) {
            $id = $_POST['id'];

            if (isset($_POST['category']))
                $category = $_POST['category'];

            $view = $this->getView('Classified');
            if ($view)
                $view->search($id, $category);
            else
                $this->redirect('errors/404.html');
        } else if (isset($_POST['category'])) {
            $id = null;
            $category = $_POST['category'];
            $view = $this->getView('Classified');
            if ($view)
                $view->search($id, $category);
            else
                $this->redirect('errors/404.html');
        } else {
            $view = $this->getView('Classified');
            if ($view || $view->index())
                $view->index();
            else
                $this->redirect('errors/404.html');
        }
    }

    public function add()
    {
        $accessController = new \Controllers\Access();
        $accessController->islogin();

        $view = $this->getView('Classified');
        if ($view)
            $view->add();
        else
            $this->redirect('errors/404.html');
    }

    public function edit($id = null)
    {
        $accessController = new \Controllers\Access();
        $accessController->islogin();

        $modelUser = $this->getModel('User');
        $user_id = $modelUser->getIdByLogin(\Tools\Access::get(\Tools\Access::$login));

        $model = $this->getModel('Classified');
        if ($model) {
            $data = $model->getOne($id);
            if (isset($data['classifieds'])) {
                if ($data['classifieds'][0]['user_id'] != $user_id) {
                    $this->redirect('classifieds/');
                }
            }
        }

        if ($id !== null) {
            $view = $this->getView('Classified');
            if ($view)
                $view->edit($id);
            else
                $this->redirect('errors/404.html');
        } else
            $this->redirect('classifieds/');
    }

    //dodaje do bazy ogloszenie
    public function insert()
    {
        $accessController = new \Controllers\Access();
        $accessController->islogin();

        //za operację na bazie danych odpowiedzialny jest model
        //tworzymy obiekt modelu i zlecamy dodanie ogloszenia
        $model = $this->getModel('Classified');
        if ($model) {
            $modelUser = $this->getModel('User');
            $user_id = $modelUser->getIdByLogin(\Tools\Access::get(\Tools\Access::$login));

            // sprawdzamy, czy id z formularza jest zgodne z id zalogowanego użytkownika
            if ($_POST['user_id'] != $user_id)
                $_POST['user_id'] = $user_id;

            $model->insert($_POST['category_id'], $_POST['user_id'], $_POST['title'], $_POST['content'], $_POST['price'], $_POST['city']);
            $this->redirect('classifieds/');
        } else
            $this->redirect('errors/404.html');
    }

    public function update()
    {
        $accessController = new \Controllers\Access();
        $accessController->islogin();

        $model = $this->getModel('Classified');
        $data = $model->update($_POST['id'], $_POST['category_id'], $_POST['title'], $_POST['content'], $_POST['price'], $_POST['city']);
        if (isset($data['error']))
            \Tools\Session::set('error', $data['error']);
        if (isset($data['message']))
            \Tools\Session::set('message', $data['message']);
        $this->redirect('classifieds/');
    }

    public function delete($id)
    {
        $accessController = new \Controllers\Access();
        $accessController->islogin();

        $model = $this->getModel('Classified');
        $data = $model->delete($id);
        if (isset($data['error']))
            \Tools\Session::set('error', $data['error']);
        if (isset($data['message']))
            \Tools\Session::set('message', $data['message']);
        $this->redirect('classifieds/');
    }

    public function getAll()
    {
        $view = $this->getView('Classified');
        $data = null;
        if (\Tools\Session::is('message'))
            $data['message'] = \Tools\Session::get('message');
        if (\Tools\Session::is('error'))
            $data['error'] = \Tools\Session::get('error');

        $view->getAll();
        \Tools\Session::clear('message');
        \Tools\Session::clear('error');
    }

}