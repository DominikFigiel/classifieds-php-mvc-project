<?php

namespace Views;

class Access extends View
{
    //wyświetla formularz do logowania
    public function logform($data = null)
    {
        $this->set('customScript', 'logform');
        if (isset($data['message']))
            $this->set('message', $data['message']);
        if (isset($data['error']))
            $this->set('error', $data['error']);
        $this->render('LogForm');
    }
}



