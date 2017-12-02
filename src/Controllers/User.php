<?php
namespace Controllers;

class User extends Controller {

    public function index(){
        //tworzy obiekt widoku i zleca wyświetlenie
        //wszystkich użytkowników w widoku
        $view = $this->getView('User');
        if(!$view || !$view->index())
            $this->redirect('errors/404.html');
    }

    public function add() {
        $view=$this->getView('User');
        if($view)
            $view->add();
        else
            $this->redirect('errors/404.html');
    }

    public function edit($id=null){
        if($id !== null)
        {
            $view=$this->getView('User');
            if($view)
                $view->edit($id);
            else
                $this->redirect('errors/404.html');
        }
        else
            $this->redirect('users/');
    }

    //dodaje do bazy kategorię
    public function insert() {
        //za operację na bazie danych odpowiedzialny jest model
        //tworzymy obiekt modelu i zlecamy dodanie użytkownika
        $model=$this->getModel('User');
        if($model){
            $model->insert($_POST['name'],$_POST['surname'],$_POST['login'],$_POST['password']);
            $this->redirect('users/');
        } else
            $this->redirect('errors/404.html');
    }

    public function getAll(){
        $view = $this->getView('User');
        $data = null;
        if(\Tools\Session::is('message'))
            $data['message'] = \Tools\Session::get('message');
        if(\Tools\Session::is('error'))
            $data['error'] = \Tools\Session::get('error');
        $view->getAll($data);
        \Tools\Session::clear('message');
        \Tools\Session::clear('error');
    }

    public function addform(){
        $view = $this->getView('User');
        $view->addform();
    }

    public function delete($id){
        $model=$this->getModel('User');
        $data = $model->delete($id);
        if(isset($data['error']))
            \Tools\Session::set('error', $data['error']);
        if(isset($data['message']))
            \Tools\Session::set('message', $data['message']);
        $this->redirect('users/');
    }

    public function editform($id)
    {
        $model = $this->getModel('User');
        $data = $model->getOne($id);
        if (isset($data['error'])){
            \Tools\Session::set('error', $data['error']);
            $this->redirect('?controller=User&action=getAll');
        }
        $view = $this->getView('User');
        $view->editform($data['users'][0]);
    }

    public function update(){
        $model = $this -> getModel('User');
        $data = $model -> update($_POST['id'],$_POST['name'],$_POST['surname'],$_POST['login'],$_POST['password']);
        if(isset($data['error']))
            \Tools\Session::set('error', $data['error']);
        if(isset($data['message']))
            \Tools\Session::set('message', $data['message']);
        $this->redirect('users/');
    }


}