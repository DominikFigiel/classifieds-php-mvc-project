<html>
    <head>
        <title>Baza Ogłoszeń</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
    <nav>
        <ul>
            <li>
                <a href="http://<?php echo $_SERVER['HTTP_HOST']?>/<?php echo \Config\Website\Config::$subdir ?>?controller=User&amp;action=getAll">Użytkownicy</a>
            </li>
            <li>
                <a href="http://<?php echo $_SERVER['HTTP_HOST']?>/<?php echo \Config\Website\Config::$subdir ?>?controller=Category&amp;action=getAll">Kategorie</a>
            </li>
            <li>
                <a href="http://<?php echo $_SERVER['HTTP_HOST']?>/<?php echo \Config\Website\Config::$subdir ?>?controller=Classified&amp;action=getAll">Ogłoszenia</a>
            </li>
        </ul>
    </nav>