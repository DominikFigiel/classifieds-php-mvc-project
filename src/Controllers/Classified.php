<?php

namespace Controllers;

class Classified extends Controller
{

    public function index()
    {
        //tworzy obiekt widoku i zleca wyświetlenie
        //wszystkich użytkowników w widoku
        $view = $this->getView('Classified');
        if (!$view || !$view->index())
            $this->redirect('errors/404.html');
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

    public function addform()
    {
        $view = $this->getView('Classified');
        $view->addform();
    }

    public function add()
    {
        $view = $this->getView('Classified');
        if ($view)
            $view->add();
        else
            $this->redirect('errors/404.html');
    }

    //dodaje do bazy ogloszenie
    public function insert()
    {
        //za operację na bazie danych odpowiedzialny jest model
        //tworzymy obiekt modelu i zlecamy dodanie ogloszenia
        $model = $this->getModel('Classified');
        if ($model) {
            $model->insert($_POST['category_id'], $_POST['user_id'], $_POST['title'], $_POST['content'], $_POST['price']);
            $this->redirect('classifieds/');
        } else
            $this->redirect('errors/404.html');
    }

    public function update()
    {
        $model = $this->getModel('Classified');
        $data = $model->update($_POST['id'], $_POST['category_id'], $_POST['title'], $_POST['content'], $_POST['price']);
        if (isset($data['error']))
            \Tools\Session::set('error', $data['error']);
        if (isset($data['message']))
            \Tools\Session::set('message', $data['message']);
        $this->redirect('classifieds/');
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

    public function editform($id)
    {
        $model = $this->getModel('Classified');
        $data = $model->getOne($id);
        if (isset($data['error'])) {
            \Tools\Session::set('error', $data['error']);
            $this->redirect('?controller=Classified&action=getAll');
        }
        $view = $this->getView('Classified');
        $view->editform($data['classifieds'][0]);
    }


}