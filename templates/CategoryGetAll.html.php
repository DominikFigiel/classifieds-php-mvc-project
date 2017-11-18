<?php include 'templates/header.html.php'; ?>
<h1>Lista kategorii</h1>
<ul>
    <?php $categories = $this->get('categories');
    if(isset($categories)) {
        foreach($categories as $item) { ?>
    <li><?= $item['name']; ?> 
        <a href="http://<?php echo $_SERVER['HTTP_HOST']?>/<?php echo \Config\Website\Config::$subdir?>categories/edit-form/<?= $item['id']; ?>">edytuj</a>

        <a href="http://<?php echo $_SERVER['HTTP_HOST']?>/<?php echo \Config\Website\Config::$subdir?>categories/delete/<?= $item['id']; ?>">usuń</a>
    </li>
    <?php }} ?>
</ul>
<strong><?= $this->get('error')?></strong>
<br/><br/>
<a href="http://<?php echo $_SERVER['HTTP_HOST']?>/
<?php echo \Config\Website\Config::$subdir?>categories/add-form/">Dodaj kategorię</a>


<?php include 'templates/footer.html.php'; ?>