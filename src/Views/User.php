<?php
namespace Views;

class User extends View {

    public function index(){
        //pobranie z modelu listy użytkowników
        $model = $this->getModel('User');
        if($model) {
            $data = $model->getAll();
            if(isset($data['users']))
                $this->set('allUsers', $data['users']);
            if(isset($data['error']))
                $this->set('error', $data['error']);
            $this->render('Users');
            return true;
        }
        return false;
    }

    //wyświetlenie widoku z formularzem do dodawania użytkownika
    public function add(){
        $this->render('AddUser');
    }

    //wyświetlenie widoku z wybranym użytkownikiem do edycji
    public function edit($id){
        //pobranie wybranej kategorii
        $model = $this->getModel('User');
        if($model) {
            $data = $model->getOne($id);
            if(isset($data['users']))
                $this->set('oneUser', $data['users']);
            if(isset($data['error']))
                $this->set('error', $data['error']);
            $this->render('EditUser');
            return true;
        }
        return false;
    }

    public function getAll($data = null){
        if(isset($data['message']))
            $this->set('message',$data['message']);
        if(isset($data['error']))
            $this->set('error',$data['error']);

        $model = $this->getModel('User');
        $data = $model->getAll();
        $this->set('users', $data['users']);
        if(isset($data['error']))
            $this->set('error', $data['error']);
        //$this->set('customScript', array('datatables.min', 'table.min'));
        $this->render('UserGetAll');
    }

    public function addform(){
        //$this->set('customScript', array('jquery.validate.min', 'UserAddForm'));
        $this->render('UserAddForm');
    }

    public function editform($user){
        $this->set('id', $user[\Config\Database\DBConfig\User::$id]);
        $this->set('name', $user[\Config\Database\DBConfig\User::$name]);
        $this->set('surname', $user[\Config\Database\DBConfig\User::$surname]);
        $this->set('login', $user[\Config\Database\DBConfig\User::$login]);
        $this->set('password', '');
        $this->set('customScript', array('jquery.validate.min', 'UserAddForm'));
        $this->render('UserEditForm');
    }

}