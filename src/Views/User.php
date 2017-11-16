<?php
namespace Views;

class User extends View {

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