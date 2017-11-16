<?php include 'templates/header.html.php'; ?>

<h1>Lista użytkowników</h1>
<ul>
    <?php $users = $this->get('users');
    if(isset($users)) {
        foreach ($users as $item) { ?>
    <li><?= $item['name'].' '.$item['surname'].' '.'('.$item['login'].')'; ?>
        <a href="http://<?php echo $_SERVER['HTTP_HOST']?>/<?php echo \Config\Website\Config::$subdir ?>?controller=User&amp;action=editform&amp;id=<?php echo $item['id'] ?>">edytuj</a>

        <a href="http://<?php echo $_SERVER['HTTP_HOST']?>/<?php echo \Config\Website\Config::$subdir ?>?controller=User&amp;action=delete&amp;id=<?php echo $item['id'] ?>">usuń</a>
    </li>
    <?php }} ?>
</ul>
<strong> <?php echo $this->get('error') ?> </strong>
<br/><br/>
<a href="http://<?php echo $_SERVER['HTTP_HOST']?>/
<?php echo \Config\Website\Config::$subdir?>
?controller=User&amp;action=addform">Dodaj użytkownika</a>

<?php include 'templates/footer.html.php'; ?>

