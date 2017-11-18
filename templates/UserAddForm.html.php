<?php include 'templates/header.html.php'; ?>

    <h1>Dodaj użytkownika</h1>
    <form action="http://<?php echo $_SERVER['HTTP_HOST']?>/<?php echo \Config\Website\Config::$subdir?>users/add" method="post">
        Login: <input type="text" name="login" /><br />
        Hasło: <input type="password" name="password" /><br />
        Imię: <input type="text" name="name" /><br />
        Nazwisko: <input type="text" name="surname" /><br />
        <input type="submit" value="Dodaj" />
    </form>

<?php include 'templates/footer.html.php'; ?>