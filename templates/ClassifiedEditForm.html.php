<?php include 'templates/header.html.php'; ?>

    <?php $categories = $this->get('data')['categories']; ?>
    <h1>Edytuj ogłoszenie</h1>
    <form action="http://<?php echo $_SERVER['HTTP_HOST']?>/<?php echo \Config\Website\Config::$subdir?>?controller=Classified&action=update" method="post">
        <input type="hidden" id="id" name="id" value="<?php echo $this->get('id') ?>">
        ID Kategorii:
        <select name="category_id">
            <?php foreach($categories as $category): ?>
                <option value="<?php echo $category['id'] ?>"
                <?php
                    if($category['id'] === $this->get('category_id'))
                        echo " selected";
                ?>
                ><?php echo $category['name'] ?></option>
            <?php endforeach; ?>
        </select>
        <br />
        Tytuł: <input type="text" name="title" value="<?php echo $this->get('title') ?>"/><br />
        Cena: <input type="text" name="price" value="<?php echo $this->get('price') ?>"/><br />
        Treść: <textarea name="content" rows="7" cols="50"><?php echo $this->get('content') ?></textarea><br />
        <input type="submit" value="Aktualizuj" />
    </form>

<?php include 'templates/footer.html.php'; ?>