<?php
namespace Views;

class Category extends View {
    public function getAll($data = null){
        $model = $this->getModel('Category');
        $data = $model->getAll();
        $this->set('categories', $data['categories']);
        if(isset($data['error']))
            $this->set('error', $data['error']);
        //$this->set('customScript', array('datatables.min', 'table.min'));
        $this->render('CategoryGetAll');
    }
    public function index(){
        //pobranie z modelu listy kategorii
        $model = $this->getModel('Category');
        if($model) {
            $data = $model->getAll();
            if(isset($data['categories']))
                $this->set('allCats', $data['categories']);
            if(isset($data['error']))
                $this->set('error', $data['error']);
            $this->render('Categories');
            return true;
        }
        return false;
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


