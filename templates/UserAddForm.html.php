<?php include 'templates/header.html.php'; ?>

    <h1>Dodaj użytkownika</h1>
    <form action="http://<?php echo $_SERVER['HTTP_HOST']?>/<?php echo \Config\Website\Config::$subdir?>users/add/" method="post">
        Login: <input type="text" name="login" required /><br />
        Hasło: <input type="password" name="password" required /><br />
        Imię: <input type="text" name="name" required /><br />
        Nazwisko: <input type="text" name="surname" required /><br />
        <input type="submit" value="Dodaj" />
    </form>

<?php include 'templates/footer.html.php'; ?>