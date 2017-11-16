<?php
namespace Controllers;

class Category extends Controller {

    public function getAll(){
        $view = $this->getView('Category');
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
        $view = $this->getView('Category');
        $view->addform();
    }
    public function add(){
        $model=$this->getModel('Category');
        $data = $model->add($_POST['name']);
        if(isset($data['error']))
            \Tools\Session::set('error', $data['error']);
        if(isset($data['message']))
            \Tools\Session::set('message', $data['message']);
        $this->redirect('categories/');
    }
    public function delete($id){
        $model=$this->getModel('Category');
        $data = $model->delete($id);
        if(isset($data['error']))
            \Tools\Session::set('error', $data['error']);
        if(isset($data['message']))
            \Tools\Session::set('message', $data['message']);
        $this->redirect('categories/');
    }
    public function editform($id){
        $model = $this->getModel('Category');
        $data = $model->getOne($id);
        if(isset($data['error'])){
            \Tools\Session::set('error', $data['error']);
            $this->redirect('categories/');
        }
        $view = $this->getView('Category');
        $view->editform($data['categories'][0]);
    }
    public function update(){
        $model=$this->getModel('Category');
        $data = $model->update($_POST['id'], $_POST['name']);
        if(isset($data['error']))
            \Tools\Session::set('error', $data['error']);
        if(isset($data['message']))
            \Tools\Session::set('message', $data['message']);
        $this->redirect('categories/');
    }


}
