<?php
namespace Views;

class Category extends View {
    public function getAll($data = null){
        if(isset($data['message']))
            $this->set('message',$data['message']);
        if(isset($data['error']))
            $this->set('error',$data['error']);
        $model = $this->getModel('Category');
        $data = $model->getAll();
        $this->set('categories', $data['categories']);
        if(isset($data['error']))
            $this->set('error', $data['error']);
        //$this->set('customScript', array('datatables.min', 'table.min'));
        $this->render('CategoryGetAll');
    }
    public function addform(){
        //$this->set('customScript', array('jquery.validate.min', 'CategoryAddForm'));
        $this->render('CategoryAddForm');
    }
    public function editform($category){
        $this->set('id', $category[\Config\Database\DBConfig\Category::$id]);
        $this->set('name', $category[\Config\Database\DBConfig\Category::$name]);
        $this->set('customScript', array('jquery.validate.min', 'CategoryAddForm'));
        $this->render('CategoryEditForm');
    }
}


