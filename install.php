<!doctype html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <title>Instalacja</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php
        require 'vendor/autoload.php';

        use Config\Database\DBConfig as DB;
        use Config\Database\DBConnection as DBConnection;

        DBConnection::setDBConnection(
            DB::$user,DB::$password,
            DB::$hostname, DB::$databaseType, DB::$port
        );
        try {
            $pdo = DBConnection::getHandle();
        }catch(\PDOException $e){
            echo \Config\Database\DBErrorName::$connection;
            exit(1);
        }

        // tworzenie tabeli kategorii

        $query = 'CREATE TABLE IF NOT EXISTS`'.DB::$tableCategory.'` 
        (
        `'.DB\Category::$id.'` INT NOT NULL AUTO_INCREMENT,
        `'.DB\Category::$name.'` VARCHAR(30) NOT NULL,
        PRIMARY KEY ('.DB\Category::$id.')) ENGINE=InnoDB;';
        try
        {
            $pdo -> exec($query);
        }
        catch(\PDOException $e)
        {
            echo \Config\Database\DBErrorName::$create_table.DB::$tableCategory;
        }

        // tworzenie tabeli uzytkownicy

        $query = 'CREATE TABLE IF NOT EXISTS `'.DB::$tableUser.'`
        (
        `'.DB\User::$id.'` INT NOT NULL AUTO_INCREMENT,
        `'.DB\User::$name.'` VARCHAR(30) NOT NULL,
        `'.DB\User::$surname.'` VARCHAR(30) NOT NULL,
        `'.DB\User::$login.'` VARCHAR(30) NOT NULL,
        `'.DB\User::$password.'` VARCHAR(40) NOT NULL,
        PRIMARY KEY('.DB\User::$id.')) ENGINE=InnoDB;';
        try
        {
            $pdo -> exec($query);
        }
        catch(\PDOException $e)
        {
            echo \Config\Database\DBErrorName::$create_table.DB::$tableUser;
        }

        // tworzenie tabeli ogloszenia

        $query = 'CREATE TABLE IF NOT EXISTS `'.DB::$tableClassified.'`
        (
            `'.DB\Classified::$id.'` INT NOT NULL AUTO_INCREMENT,
            `'.DB\Classified::$category_id.'` INT NOT NULL, 
            `'.DB\Classified::$user_id.'` INT NOT NULL, 
            `'.DB\Classified::$title.'` VARCHAR(50) NOT NULL,
            `'.DB\Classified::$content.'` VARCHAR(500) NOT NULL,
            `'.DB\Classified::$price.'` FLOAT NOT NULL,
            `'.DB\Classified::$date.'` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,	
            `' . DB\Classified::$city . '` VARCHAR(50) NOT NULL,
            PRIMARY KEY ('.DB\Classified::$id.'),
            FOREIGN KEY ('.DB\Classified::$category_id.') REFERENCES '.DB::$tableCategory.'('.DB\Category::$id.') ON DELETE CASCADE,
            FOREIGN KEY ('.DB\Classified::$user_id.') REFERENCES '.DB::$tableUser.'('.DB\User::$id.') ON DELETE CASCADE
            ) ENGINE=InnoDB;';
        try
        {
            $pdo -> exec($query);
        }
        catch(\PDOException $e)
        {
            echo \Config\Database\DBErrorName::$create_table.DB::$tableClassified;
        }

        // usuniecie starych danych - kategorie

        $query = 'DELETE FROM `'.DB::$tableCategory.'`';
        try
        {
            $pdo -> exec($query);
        }
        catch(\PDOException $e)
        {
            echo $e;
            echo \Config\Database\DBErrorName::$delete_table.DB::$tableCategory;
        }


        $query = 'ALTER TABLE `'.DB::$tableCategory.'`AUTO_INCREMENT=1';
        try
        {
            $pdo -> exec($query);
        }
        catch(\PDOException $e)
        {
            echo $e;
            echo \Config\Database\DBErrorName::$delete_table.DB::$tableCategory;
        }

        // usuniecie starych danych - uzytkownicy

        $query = 'DELETE FROM `'.DB::$tableUser.'`';
        try
        {
            $pdo -> exec($query);
        }
        catch(\PDOException $e)
        {
            echo $e;
            echo \Config\Database\DBErrorName::$delete_table.DB::$tableUser;
        }

        $query = 'ALTER TABLE `'.DB::$tableUser.'`AUTO_INCREMENT=1';
        try
        {
            $pdo -> exec($query);
        }
        catch(\PDOException $e)
        {
            echo $e;
            echo \Config\Database\DBErrorName::$delete_table.DB::$tableUser;
        }

        // usuniecie starych danych - ogloszenia

        $query = 'DELETE FROM `'.DB::$tableClassified.'`';
        try
        {
            $pdo -> exec($query);
        }
        catch(\PDOException $e)
        {
            echo $e;
            echo \Config\Database\DBErrorName::$delete_table.DB::$tableClassified;
        }

        // wypelnienie tabel danymi

        $kategorie = array();
        $kategorie[] = 'motoryzacja';
        $kategorie[] = 'elektronika';
        $kategorie[] = 'sport';
        $kategorie[] = 'uslugi';

        try
        {

            $stmt = $pdo ->prepare('INSERT INTO `'.DB::$tableCategory.'`
             (`'.DB\Category::$name.'`) VALUES(:kategoria)');
            foreach ($kategorie as $kategoria)
            {
                $stmt -> bindValue(':kategoria', $kategoria, PDO::PARAM_STR);
                $stmt -> execute();
            }
        }
        catch(\PDOException $e)
        {
            echo \Config\Database\DBErrorName::$noadd;
        }

        $uzytkownicy = array();
        $uzytkownicy[] = array("Dominik","Figiel","dominik1","dominik1");
        $uzytkownicy[] = array("Andrzej","Marek","marek1","marek1");
        $uzytkownicy[] = array("Mateusz","Marcin","mateusz1","mateusz1");

        try
        {
            $stmt = $pdo ->prepare(
                'INSERT INTO `'.DB::$tableUser.'` (`'.DB\User::$name.'`, `'.DB\User::$surname.'`,`'.DB\User::$login.'`, `'.DB\User::$password.'`) 
            VALUES (:name, :surname, :login, :password)');
            foreach ($uzytkownicy as $uzytkownik)
            {
                $stmt -> bindValue(':name', $uzytkownik[0], PDO::PARAM_STR);
                $stmt -> bindValue(':surname', $uzytkownik[1], PDO::PARAM_STR);
                $stmt -> bindValue(':login', $uzytkownik[2], PDO::PARAM_STR);
                $stmt -> bindValue(':password', md5($uzytkownik[3]), PDO::PARAM_STR);
                $stmt -> execute();
            }
        }
        catch(\PDOException $e)
        {
            echo \Config\Database\DBErrorName::$noadd;
        }

        /* reset numerowania
        DELETE FROM tablename;
        ALTER TABLE tablename AUTO_INCREMENT=1
        */
        $ogloszenia = array();
        $ogloszenia[] = array("1","1","Fiat Grande Punto",
            "Sprzedam Fiata Grande Punto 2006 r .Przebieg 139 tyś km .5- drzwiowy. Wersja Giugiaro.",
            "12900", "Kalisz");
        $ogloszenia[] = array("1","1","Fiat 500",
            "Sprzedam Fiata 500, 2008 r .Przebieg 100 tyś km !",
            "20000", "Kalisz");
        $ogloszenia[] = array("1","1","BMW E46",
            "Sprzedam BMW E46, 2003 r .Przebieg 300 tyś km !",
            "10000", "Ostrów Wielkopolski");

        try
        {
            $stmt = $pdo ->prepare(
                'INSERT INTO `' . DB::$tableClassified . '` (`' . DB\Classified::$category_id . '`, `' . DB\Classified::$user_id . '`,`' . DB\Classified::$title . '`,`' . DB\Classified::$content . '`, `' . DB\Classified::$price . '`, `' . DB\Classified::$city . '`) 
            VALUES (:category_id, :user_id, :title, :content, :price, :city)');
            foreach ($ogloszenia as $ogloszenie)
            {
                $stmt -> bindValue(':category_id', $ogloszenie[0], PDO::PARAM_INT);
                $stmt -> bindValue(':user_id', $ogloszenie[1], PDO::PARAM_INT);
                $stmt -> bindValue(':title', $ogloszenie[2], PDO::PARAM_STR);
                $stmt -> bindValue(':content', $ogloszenie[3], PDO::PARAM_STR);
                $stmt -> bindValue(':price', $ogloszenie[4], PDO::PARAM_STR);
                $stmt->bindValue(':city', $ogloszenie[5], PDO::PARAM_STR);
                $stmt -> execute();
            }
        }
        catch(\PDOException $e)
        {
            echo \Config\Database\DBErrorName::$noadd;
        }


        echo "<b>Instalacja aplikacji zakończona!</b>";

        // przekierowanie do index.php po instalacji
        header('location: '.'http://'.$_SERVER["SERVER_NAME"].'/'.\Config\Website\Config::$subdir.'index.php');

        ?>
    </body>
</html>