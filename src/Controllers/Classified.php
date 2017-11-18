<?php
namespace Controllers;

class Classified extends Controller {

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

    public function addform(){
        $view = $this->getView('Classified');
        $view->addform();
    }

    public function add(){
        $model=$this->getModel('Classified');
        $data = $model->add($_POST['category_id'],$_POST['user_id'],$_POST['title'],$_POST['content'],$_POST['price']);
        if(isset($data['error']))
            \Tools\Session::set('error', $data['error']);
        if(isset($data['message']))
            \Tools\Session::set('message', $data['message']);
        $this->redirect('classifieds');
    }

    public function delete($id){
        $model=$this->getModel('Classified');
        $data = $model->delete($id);
        if(isset($data['error']))
            \Tools\Session::set('error', $data['error']);
        if(isset($data['message']))
            \Tools\Session::set('message', $data['message']);
        $this->redirect('classifieds');
    }

    public function editform($id)
    {
        $model = $this->getModel('Classified');
        $data = $model->getOne($id);
        if (isset($data['error'])){
            \Tools\Session::set('error', $data['error']);
            $this->redirect('?controller=Classified&action=getAll');
        }
        $view = $this->getView('Classified');
        $view->editform($data['classifieds'][0]);
    }

    public function update(){
        $model = $this -> getModel('Classified');
        $data = $model -> update($_POST['id'],$_POST['category_id'],$_POST['title'],$_POST['content'],$_POST['price']);
        if(isset($data['error']))
            \Tools\Session::set('error', $data['error']);
        if(isset($data['message']))
            \Tools\Session::set('message', $data['message']);
        $this->redirect('classifieds');
    }


}