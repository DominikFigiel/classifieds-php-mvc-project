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
                <a href="http://<?php echo $_SERVER['HTTP_HOST']?>/<?php echo \Config\Website\Config::$subdir ?>users/">Użytkownicy</a>
            </li>
            <li>
                <a href="http://<?php echo $_SERVER['HTTP_HOST']?>/<?php echo \Config\Website\Config::$subdir ?>categories/">Kategorie</a>
            </li>
            <li>
                <a href="http://<?php echo $_SERVER['HTTP_HOST']?>/<?php echo \Config\Website\Config::$subdir ?>classifieds/">Ogłoszenia</a>
            </li>
        </ul>
    </nav>