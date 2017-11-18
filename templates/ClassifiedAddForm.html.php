<?php include 'templates/header.html.php'; ?>

    <?php $categories = $this->get('data')['categories']; ?>
    <h1>Dodaj ogłoszenie</h1>
    <form action="http://<?php echo $_SERVER['HTTP_HOST']?>/<?php echo \Config\Website\Config::$subdir?>classifieds/add" method="post">
        ID Użytkownika: <input type="text" name="user_id" value="1" readonly /><br />
        ID Kategorii:
        <select name="category_id">
            <?php foreach($categories as $category): ?>
                <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
            <?php endforeach; ?>
        </select>
        <br />
        Tytuł: <input type="text" name="title" required /><br />
        Cena: <input type="number" step="0.01" name="price" required /><br />
        Treść: <textarea name="content" rows="7" cols="50"></textarea><br />
        <input type="submit" value="Dodaj" />
    </form>

<?php include 'templates/footer.html.php'; ?>