<?php include 'templates/header.html.php'; ?>

<h1>Edytuj kategorię</h1>
<form action="http://<?php echo $_SERVER['HTTP_HOST']?>/<?php echo \Config\Website\Config::$subdir?>?controller=Category&action=update" method="post">
    <input type="hidden" id="id" name="id" value="<?php echo $this->get('id') ?>"> 
    Nazwa kategorii: <input type="text" name="name" value="<?php echo $this->get('name') ?>"/><br />
    <input type="submit" value="Aktualizuj" />
</form>

<?php include 'templates/footer.html.php'; ?>