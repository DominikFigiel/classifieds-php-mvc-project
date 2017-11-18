<?php include 'templates/header.html.php'; ?>

<h1>Lista ogłoszeń</h1>
<ul>
    <?php
    $classifieds = $this->get('classifieds');
    $categories = $this->get('categories');

    if(isset($classifieds)) {
        foreach ($classifieds as $item) { ?>
            <li>
                <?= '<strong>'.$categories[$item['category_id']].'</strong><br/> '.$item['title'].'<br/>'.$item['content'].'<br/>'.$item['price'].'<br/>'.$item['date']; ?>
                <a href="http://<?php echo $_SERVER['HTTP_HOST']?>/<?php echo \Config\Website\Config::$subdir ?>classifieds/edit-form/<?php echo $item['id'] ?>">edytuj</a>

                <a href="http://<?php echo $_SERVER['HTTP_HOST']?>/<?php echo \Config\Website\Config::$subdir ?>classifieds/delete/<?php echo $item['id'] ?>">usuń</a>
            </li>
        <?php }} ?>
</ul>
<strong> <?php echo $this->get('error') ?> </strong>
<br/><br/>
<a href="http://<?php echo $_SERVER['HTTP_HOST']?>/<?php echo \Config\Website\Config::$subdir?>classifieds/add-form/">Dodaj ogłoszenie</a>

<?php include 'templates/footer.html.php'; ?>

