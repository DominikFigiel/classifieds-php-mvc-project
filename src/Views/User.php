<?php

namespace Views;

class User extends View
{

    // wyswietlenie widoku wszystkich uzytkownikow
    public function index()
    {
        //pobranie z modelu listy użytkowników
        $model = $this->getModel('User');
        if ($model) {
            $data = $model->getAll();
            if (isset($data['users']))
                $this->set('allUsers', $data['users']);
            if (isset($data['error']))
                $this->set('error', $data['error']);
            $this->render('Users');
            return true;
        }
        return false;
    }

    // wyświetlenie widoku z formularzem do dodawania użytkownika
    public function add()
    {
        $this->render('AddUser');
    }

    // wyświetlenie widoku z wybranym użytkownikiem do edycji
    public function edit($id)
    {
        //pobranie wybranego uzytkownika
        $model = $this->getModel('User');
        if ($model) {
            $data = $model->getOne($id);
            if (isset($data['users']))
                $this->set('oneUser', $data['users']);
            if (isset($data['error']))
                $this->set('error', $data['error']);
            $this->render('EditUser');
            return true;
        }
        return false;
    }

}