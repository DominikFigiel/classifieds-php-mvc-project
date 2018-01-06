<?php

namespace Models;

use \PDO;
use Config\Database\DBConfig as DB;

class Classified extends Model
{

    public function getAll()
    {
        if ($this->pdo === null) {
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }
        $data = array();
        $data['classifieds'] = array();
        try {
            //$stmt = $this->pdo->query('SELECT * FROM `'.DB::$tableClassified.'`');
            $stmt = $this->pdo->
            query('SELECT classified.id, classified.user_id, classified.title,classified.content,classified.price,classified.date, category.name, classified.city , user.login 
            FROM `classified` 
            INNER JOIN category ON category.id = classified.category_id 
            INNER JOIN user ON user.id = classified.user_id');

            $classifieds = $stmt->fetchAll();
            $stmt->closeCursor();
            if ($classifieds && !empty($classifieds))
                $data['classifieds'] = $classifieds;
        } catch (\PDOException $e) {
            $data['error'] = \Config\Database\DBErrorName::$query;
        }
        return $data;
    }

    public function getAllByUserId($id)
    {
        if ($this->pdo === null) {
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }
        $data = array();
        $data['classifieds'] = array();

        try {
            //$stmt = $this->pdo->query('SELECT * FROM `'.DB::$tableClassified.'`');
            $polecenie = "
        SELECT classified.id, classified.user_id, classified.title,classified.content,classified.price,classified.date, category.name, classified.city , user.login 
        FROM `classified` 
        INNER JOIN category ON category.id = classified.category_id 
        INNER JOIN user ON user.id = classified.user_id  WHERE (classified.user_id = '" . $id . "')";
            $stmt = $this->pdo->query($polecenie);

            $classifieds = $stmt->fetchAll();
            $stmt->closeCursor();
            if ($classifieds && !empty($classifieds))
                $data['classifieds'] = $classifieds;
        } catch (\PDOException $e) {
            $data['error'] = \Config\Database\DBErrorName::$query;
        }

        return $data;
    }

    public function getSearchResults($id, $category)
    {
        if ($this->pdo === null) {
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }
        $data = array();
        $data['classifieds'] = array();

        if ($id != null) {

            try {
                //$stmt = $this->pdo->query('SELECT * FROM `'.DB::$tableClassified.'`');
                $polecenie = "SELECT classified.id, classified.user_id, classified.title,classified.content,classified.price,classified.date, category.name, classified.city , user.login 
            FROM `classified` 
            INNER JOIN category ON category.id = classified.category_id 
            INNER JOIN user ON user.id = classified.user_id  WHERE (classified.title LIKE '%" . $id . "%' OR classified.content LIKE '%" . $id . "%') AND category.name LIKE '%" . $category . "%' ";
                $stmt = $this->pdo->query($polecenie);

                $classifieds = $stmt->fetchAll();
                $stmt->closeCursor();
                if ($classifieds && !empty($classifieds))
                    $data['classifieds'] = $classifieds;
            } catch (\PDOException $e) {
                $data['error'] = \Config\Database\DBErrorName::$query;
            }
        } else {
            try {
                //$stmt = $this->pdo->query('SELECT * FROM `'.DB::$tableClassified.'`');
                $polecenie = "SELECT classified.id, classified.user_id, classified.title,classified.content,classified.price,classified.date, category.name, classified.city , user.login 
            FROM `classified` 
            INNER JOIN category ON category.id = classified.category_id 
            INNER JOIN user ON user.id = classified.user_id  WHERE category.name LIKE '%" . $category . "%' ";
                $stmt = $this->pdo->query($polecenie);

                $classifieds = $stmt->fetchAll();
                $stmt->closeCursor();
                if ($classifieds && !empty($classifieds))
                    $data['classifieds'] = $classifieds;
            } catch (\PDOException $e) {
                $data['error'] = \Config\Database\DBErrorName::$query;
            }

        }
        return $data;
    }

    public function getOne($id)
    {
        if ($this->pdo === null) {
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }
        if ($id === null) {
            $data['error'] = \Config\Database\DBErrorName::$nomatch;
            return data;
        }
        $data = array();
        $data['classifieds'] = array();
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM `' . \Config\Database\DBConfig::$tableClassified . '` WHERE `' . \Config\Database\DBConfig\Classified::$id . '`=:id');
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $result = $stmt->execute();
            $classifieds = $stmt->fetchAll();
            $stmt->closeCursor();
            if ($classifieds && !empty($classifieds))
                $data['classifieds'] = $classifieds;
            else
                $data['error'] = \Config\Database\DBErrorName::$nomatch;
        } catch (\PDOException $e) {
            var_dump($e);
            $data['error'] = \Config\Database\DBErrorName::$query;
        }
        return $data;
    }

    public function insert($category_id, $user_id, $title, $content, $price, $city)
    {
        if ($this->pdo === null) {
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }
        if ($category_id === null) {
            $data['error'] = \Config\Database\DBErrorName::$empty;
            return $data;
        }
        if ($user_id === null) {
            $data['error'] = \Config\Database\DBErrorName::$empty;
            return $data;
        }
        if ($title === null) {
            $data['error'] = \Config\Database\DBErrorName::$empty;
            return $data;
        }
        if ($content === null) {
            $data['error'] = \Config\Database\DBErrorName::$empty;
            return $data;
        }
        if ($price === null) {
            $data['error'] = \Config\Database\DBErrorName::$empty;
            return $data;
        }
        $data = array();
        try {
            $stmt = $this->pdo->prepare('INSERT INTO `' . DB::$tableClassified . '` (`' . DB\Classified::$category_id . '`, `' . DB\Classified::$user_id . '`,`' . DB\Classified::$title . '`, `' . DB\Classified::$content . '`, `' . DB\Classified::$price . '`, `' . DB\Classified::$city . '`) 
                                                VALUES (:category_id, :user_id, :title, :content, :price, :city)');

            $stmt->bindValue(':category_id', $category_id, PDO::PARAM_INT);
            $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->bindValue(':title', $title, PDO::PARAM_STR);
            $stmt->bindValue(':content', $content, PDO::PARAM_STR);
            $stmt->bindValue(':price', $price, PDO::PARAM_STR);
            $stmt->bindValue(':city', $city, PDO::PARAM_STR);
            var_dump($stmt);
            $result = $stmt->execute();
            if (!$result)
                $data['error'] = \Config\Database\DBErrorName::$noadd;
            else
                $data['message'] = \Config\Database\DBMessageName::$addok;
            $stmt->closeCursor();
        } catch (\PDOException $e) {
            $data['error'] = \Config\Database\DBErrorName::$query;
        }
        return $data;
    }

    public function update($id, $category_id, $title, $content, $price, $city)
    {
        $data = array();

        if ($this->pdo === null) {
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }
        if ($id === null || $category_id === null
            || $title === null || $content === null || $price === null) {
            $data['error'] = \Config\Database\DBErrorName::$empty;
            return $data;
        }
        try {
            $stmt = $this->pdo->prepare(
                'UPDATE  `' . \Config\Database\DBConfig::$tableClassified . '` SET
                    `' . \Config\Database\DBConfig\Classified::$category_id . '`=:category_id, 
                    `' . \Config\Database\DBConfig\Classified::$title . '`=:title,
                    `' . \Config\Database\DBConfig\Classified::$content . '`=:content,
                    `' . \Config\Database\DBConfig\Classified::$price . '`=:price,
                    `' . \Config\Database\DBConfig\Classified::$city . '`=:city
                    WHERE `'
                . \Config\Database\DBConfig\Classified::$id . '`=:id');
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->bindValue(':category_id', $category_id, PDO::PARAM_INT);
            $stmt->bindValue(':title', $title, PDO::PARAM_STR);
            $stmt->bindValue(':content', $content, PDO::PARAM_STR);
            $stmt->bindValue(':price', $price, PDO::PARAM_STR);
            $stmt->bindValue(':city', $city, PDO::PARAM_STR);

            $result = $stmt->execute();
            $rows = $stmt->rowCount();
            if (!$result)
                $data['error'] = \Config\Database\DBErrorName::$nomatch;
            else
                $data['message'] = \Config\Database\DBMessageName::$updateok;
            $stmt->closeCursor();
        } catch (\PDOException $e) {
            $data['error'] = \Config\Database\DBErrorName::$query;
        }
        return $data;
    }

    public function delete($id)
    {
        $data = array();
        if ($this->pdo === null) {
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }
        if ($id === null) {
            $data['error'] = \Config\Database\DBErrorName::$nomatch;
            return $data;
        }
        try {
            $stmt = $this->pdo->prepare('DELETE FROM  `' . \Config\Database\DBConfig::$tableClassified . '` WHERE  `' . \Config\Database\DBConfig\Classified::$id . '`=:id');
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $result = $stmt->execute();
            if (!$result)
                $data['error'] = \Config\Database\DBErrorName::$nomatch;
            else
                $data['message'] = \Config\Database\DBMessageName::$deleteok;
            $stmt->closeCursor();
        } catch (\PDOException $e) {
            $data['error'] = \Config\Database\DBErrorName::$query;
        }
        return $data;
    }

}