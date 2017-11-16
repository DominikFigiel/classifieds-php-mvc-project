<?php include 'templates/header.html.php'; ?>
<h1>Lista kategorii</h1>
<ul>
    <?php $categories = $this->get('categories');
    if(isset($categories)) {
        foreach($categories as $item) { ?>
    <li><?= $item['name']; ?> 
        <a href="http://<?php echo $_SERVER['HTTP_HOST']?>/<?php echo \Config\Website\Config::$subdir?>?controller=Category&amp;action=editform&amp;id=<?= $item['id']; ?>">edytuj</a>

        <a href="http://<?php echo $_SERVER['HTTP_HOST']?>/<?php echo \Config\Website\Config::$subdir?>?controller=Category&amp;action=delete&amp;id=<?= $item['id']; ?>">usuń</a>
    </li>
    <?php }} ?>
</ul>
<strong><?= $this->get('error')?></strong>
<br/><br/>
<a href="http://<?php echo $_SERVER['HTTP_HOST']?>/
<?php echo \Config\Website\Config::$subdir?>
?controller=Category&amp;action=addform">Dodaj kategorię</a>


<?php include 'templates/footer.html.php'; ?>