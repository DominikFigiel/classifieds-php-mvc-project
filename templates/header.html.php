<!doctype html>
<html lang="pl">
<head>
    <title>{block name=title}Baza Ogłoszeń{/block}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link href="http://{$smarty.server.HTTP_HOST}{$subdir}css/style.css" rel="stylesheet" type="text/css"/>
    <link href="http://{$smarty.server.HTTP_HOST}{$subdir}css/jquery-confirm.css" rel="stylesheet" type="text/css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
    <a class="navbar-brand" href="http://{$smarty.server.HTTP_HOST}{$subdir}classifieds">Baza ogłoszeń</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link"
                                    href="http://{$smarty.server.HTTP_HOST}{$subdir}users">Użytkownicy</a></li>
            <li class="nav-item"><a class="nav-link" href="http://{$smarty.server.HTTP_HOST}{$subdir}categories">Kategorie</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="http://{$smarty.server.HTTP_HOST}{$subdir}classifieds">Ogłoszenia</a>
            </li>
            <li class="nav-item"><a class="nav-link disabled" href="#" disabled>Logowanie</a></li>
            <li class="nav-item"><a class="nav-link disabled" href="#">Rejestracja</a></li>
        </ul>
        <a class="btn btn-primary" href="http://{$smarty.server.HTTP_HOST}{$subdir}classifieds/add"
           role="button">Dodaj ogłoszenie</a>
    </div>
</nav>

<div class="container">