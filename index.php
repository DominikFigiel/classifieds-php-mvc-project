<?php
require 'vendor/autoload.php';

use Config\Database\DBConfig as DB;
//Połączenie z bazą danych
Config\Database\DBConnection::setDBConnection(
    DB::$user,DB::$password,
    DB::$hostname, DB::$databaseType, DB::$port);

//Inicjalizacja sesji anonimowej
\Tools\Session::initialize();

//Kontroler/akcja/parametr_id
if(isset($_GET['controller']))
    $controller = $_GET['controller'];
else
    $controller = 'Classified';
if(isset($_GET['action']))
    $action = $_GET['action'];
else
    $action = 'index';
if(isset($_GET['id']))
    $id = $_GET['id'];
else
    $id = null;

$controller = 'Controllers\\'.$controller;

//tworzymy kontroler
$mycontroller = new $controller();
//wykonujemy akcję dla kontrolera
$mycontroller->$action($id);


