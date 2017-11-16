<?php include 'templates/header.html.php'; ?>

<h1>Dodaj kategorię</h1>
<form action="http://<?php echo $_SERVER['HTTP_HOST']?>/<?php echo \Config\Website\Config::$subdir?>?controller=Category&action=add" method="post">
    Nazwa kategorii: <input type="text" name="name" /><br />
    <input type="submit" value="Dodaj" />
</form>

<?php include 'templates/footer.html.php'; ?>