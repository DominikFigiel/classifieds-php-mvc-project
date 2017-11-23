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

    //wyświetlenie widoku z formularzem do dodawania kategorii
    public function add(){
        $this->render('AddCategory');
    }

    //wyświetlenie widoku z wybraną kategorią do edycji
    public function edit($id){
        //pobranie wybranej kategorii
        $model = $this->getModel('Category');
        if($model) {
            $data = $model->getOne($id);
            if(isset($data['categories']))
                $this->set('oneCat', $data['categories']);
            if(isset($data['error']))
                $this->set('error', $data['error']);
            $this->render('EditCategory');
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


