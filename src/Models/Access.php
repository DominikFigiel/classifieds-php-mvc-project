<?php

namespace Models;

use \PDO;

class Access extends Model
{
    public function login($login, $password, $dblogin, $dbpassword)
    {
        //tutaj powinno nastąpić weryfikacja podanych danych
        //z tymi zapisanymi w bazie
        $data = array();

        if ($login === $dblogin && $password == $dbpassword) {
            //zainicjalizowanie sesji
            \Tools\Access::login($login);
            return $data;
        }
        $data['error'] = \Config\Website\ErrorName::$wrongdata;
        return $data;
    }

    public function logout()
    {
        \Tools\Access::logout();
    }
}
