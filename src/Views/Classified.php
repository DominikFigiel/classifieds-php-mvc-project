<?php

namespace Views;

class Classified extends View
{

    // wyswietlenie widoku wszystkich ogloszen
    public function index()
    {
        // pobranie z modelu listy kategorii (dla panelu bocznego z listą kategorii)
        $model = $this->getModel('Category');
        if ($model) {
            $data = $model->getAll();
            if (isset($data['categories']))
                $this->set('allCats', $data['categories']);
        }
        //
        //pobranie z modelu listy ogloszen
        $model = $this->getModel('Classified');
        if ($model) {
            $data = $model->getAll();
            if (isset($data['classifieds']))
                $this->set('allClassifieds', $data['classifieds']);
            if (isset($data['error']))
                $this->set('error', $data['error']);
            $this->render('Classifieds');
            return true;
        }
        return false;
    }

    public function search($id)
    {
        // pobranie z modelu listy kategorii (dla panelu bocznego z listą kategorii)
        $model = $this->getModel('Category');
        if ($model) {
            $data = $model->getAll();
            if (isset($data['categories'])) {
                $this->set('allCats', $data['categories']);
                $this->set('phrase', $id);
            }
        }
        //
        //pobranie z modelu listy ogloszen
        $model = $this->getModel('Classified');
        if ($model) {
            $data = $model->getSearchResults($id);
            if (isset($data['classifieds']))
                $this->set('allClassifieds', $data['classifieds']);
            if (isset($data['error']))
                $this->set('error', $data['error']);
            $this->render('Classifieds');
            return true;
        }
        return false;
    }

    // wyświetlenie widoku z formularzem do dodawania ogłoszeń
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

}