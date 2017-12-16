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

    public function search()
    {
        if (isset($_POST['id']) && $_POST['id'] != null) {
            $id = $_POST['id'];

            if (isset($_POST['category']))
                $category = $_POST['category'];
            else
                $category = 0;

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
        $view = $this->getView('Classified');
        if ($view)
            $view->add();
        else
            $this->redirect('errors/404.html');
    }

    public function edit($id = null)
    {
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
        //za operację na bazie danych odpowiedzialny jest model
        //tworzymy obiekt modelu i zlecamy dodanie ogloszenia
        $model = $this->getModel('Classified');
        if ($model) {
            $model->insert($_POST['category_id'], $_POST['user_id'], $_POST['title'], $_POST['content'], $_POST['price'], $_POST['city']);
            $this->redirect('classifieds/');
        } else
            $this->redirect('errors/404.html');
    }

    public function update()
    {
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