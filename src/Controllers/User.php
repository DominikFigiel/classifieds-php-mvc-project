<?php
namespace Controllers;

class User extends Controller {

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

    public function add(){
        $model=$this->getModel('User');
        $data = $model->add($_POST['name'],$_POST['surname'],$_POST['login'],$_POST['password']);
        if(isset($data['error']))
            \Tools\Session::set('error', $data['error']);
        if(isset($data['message']))
            \Tools\Session::set('message', $data['message']);
        $this->redirect('users');
    }

    public function delete($id){
        $model=$this->getModel('User');
        $data = $model->delete($id);
        if(isset($data['error']))
            \Tools\Session::set('error', $data['error']);
        if(isset($data['message']))
            \Tools\Session::set('message', $data['message']);
        $this->redirect('users');
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
        $this->redirect('users');
    }


}