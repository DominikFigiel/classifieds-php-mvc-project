<?php
namespace Views;

class Classified extends View{

    public function index(){
        //pobranie z modelu listy użytkowników
        $model = $this->getModel('Classified');
        if($model) {
            $data = $model->getAll();
            if(isset($data['classifieds']))
                $this->set('allClassifieds', $data['classifieds']);
            if(isset($data['error']))
                $this->set('error', $data['error']);
            $this->render('Classifieds');
            return true;
        }
        return false;
    }

    public function getAll($data = null){
        if(isset($data['message']))
            $this->set('message',$data['message']);
        if(isset($data['error']))
            $this->set('error',$data['error']);

        $model = $this->getModel('Classified');
        $data = $model->getAll();
        $this->set('classifieds', $data['classifieds']);

        $categories = $this->getModel('Category');
        $data = $categories->getAllForSelect();
        $this->set('categories', $data);

        if(isset($data['error']))
            $this->set('error', $data['error']);
        //$this->set('customScript', array('datatables.min', 'table.min'));
        $this->render('ClassifiedGetAll');
    }

    //wyświetlenie widoku z formularzem do dodawania ogłoszeń
    public function add()
    {
        // pobranie z modelu listy kategorii
        $model = $this->getModel('Category');
        if ($model) {
            $data = $model->getAll();
            if (isset($data['categories']))
                $this->set('allCats', $data['categories']);
            if (isset($data['error']))
                $this->set('error', $data['error']);
        }
        // wyświetlenie widoku z formularzem
        $this->render('AddClassified');
    }

    //wyświetlenie widoku z wybranym ogłoszeniem do edycji
    public function edit($id)
    {
        // pobranie z modelu listy kategorii
        $model = $this->getModel('Category');
        if ($model) {
            $data = $model->getAll();
            if (isset($data['categories']))
                $this->set('allCats', $data['categories']);
            if (isset($data['error']))
                $this->set('error', $data['error']);
        }
        // pobranie wybranego ogłoszenia
        $model = $this->getModel('Classified');
        if ($model) {
            $data = $model->getOne($id);
            if (isset($data['classifieds']))
                $this->set('oneClassified', $data['classifieds']);
            if (isset($data['error']))
                $this->set('error', $data['error']);
            $this->render('EditClassified');
            return true;
        }
        return false;
    }

    public function addform(){
        $model= $this->getModel('Category');
        $data = $model->getAll();
        $this->set('data',$data);
        //$this->set('customScript', array('jquery.validate.min', 'ClassifiedAddForm'));
        $this->render('ClassifiedAddForm');
    }

    public function editform($classified){
        $model= $this->getModel('Category');
        $data = $model->getAll();
        $this->set('data',$data);


        $this->set('id', $classified[\Config\Database\DBConfig\Classified::$id]);
        $this->set('category_id', $classified[\Config\Database\DBConfig\Classified::$category_id]);
        $this->set('title', $classified[\Config\Database\DBConfig\Classified::$title]);
        $this->set('content', $classified[\Config\Database\DBConfig\Classified::$content]);
        $this->set('price', $classified[\Config\Database\DBConfig\Classified::$price]);
        $this->set('customScript', array('jquery.validate.min', 'UserAddForm'));
        $this->render('ClassifiedEditForm');
    }


}