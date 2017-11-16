<?php
    namespace Models;
    use \PDO;
    class Category extends Model {

        public function getAll(){
            if($this->pdo === null){
                $data['error'] = \Config\Database\DBErrorName::$connection;
                return $data;
            }
            $data = array();
            $data['categories'] = array();
            try{
                $stmt = $this->pdo->query('SELECT * FROM `'.\Config\Database\DBConfig::$tableCategory.'`');
                $categories = $stmt->fetchAll();
                $stmt->closeCursor();
                if($categories && !empty($categories))
                    $data['categories'] = $categories;
            }
            catch(\PDOException $e){
                $data['error'] = \Config\Database\DBErrorName::$query;
            }
            return $data;
        }

        public function getAllForSelect(){
            $data = $this->getAll();
            $categories = array();
            if(!isset($data['error']))
                foreach ($data['categories'] as $category)
                    $categories[$category[\Config\Database\DBConfig\Category::$id]] = $category[\Config\Database\DBConfig\Category::$name];
            return $categories;
        }

        public function getOne($id){
            if($this->pdo === null){
                $data['error'] = \Config\Database\DBErrorName::$connection;
                return $data;
            }
            if($id === null){
                $data['error'] = \Config\Database\DBErrorName::$nomatch;
                return data;
            }
            $data = array();
            $data['categories'] = array();
            try{
                $stmt = $this->pdo->prepare('SELECT * FROM `'.\Config\Database\DBConfig::$tableCategory.'` WHERE `'.\Config\Database\DBConfig\Category::$id.'`=:id');
                $stmt -> bindValue(':id', $id, PDO::PARAM_INT);
                $result = $stmt->execute();
                $categories = $stmt->fetchAll();
                $stmt->closeCursor();
                if($categories && !empty($categories))
                    $data['categories'] = $categories;
                else
                    $data['error'] = \Config\Database\DBErrorName::$nomatch;
            }
            catch(\PDOException $e){
                var_dump($e);
                $data['error'] = \Config\Database\DBErrorName::$query;
            }
            return $data;
        }

        public function add($name){
            if($this->pdo === null){
                $data['error'] = \Config\Database\DBErrorName::$connection;
                return $data;
            }
            if($name === null){
                $data['error'] = \Config\Database\DBErrorName::$empty;
                return $data;
            }
            $data = array();
            try	{
                $stmt = $this->pdo->prepare('INSERT INTO `'.\Config\Database\DBConfig::$tableCategory.'` (`'.\Config\Database\DBConfig\Category::$name.'`) VALUES (:name)');

                $stmt->bindValue(':name', $name, PDO::PARAM_STR);
                $result = $stmt->execute();
                if(!$result)
                    $data['error'] = \Config\Database\DBErrorName::$noadd;
                else
                    $data['message'] = \Config\Database\DBMessageName::$addok;
                $stmt->closeCursor();
            }
            catch(\PDOException $e)	{
                $data['error'] = \Config\Database\DBErrorName::$query;
            }
            return $data;
        }
        public function delete($id){
            $data = array();
            if($this->pdo === null){
                $data['error'] = \Config\Database\DBErrorName::$connection;
                return $data;
            }
            if($id === null){
                $data['error'] = \Config\Database\DBErrorName::$nomatch;
                return $data;
            }
            try	{
                $stmt = $this->pdo->prepare('DELETE FROM  `'.\Config\Database\DBConfig::$tableCategory.'` WHERE  `'.\Config\Database\DBConfig\Category::$id.'`=:id');
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                $result = $stmt->execute();
                if(!$result)
                    $data['error'] = \Config\Database\DBErrorName::$nomatch;
                else
                    $data['message'] = \Config\Database\DBMessageName::$deleteok;
                $stmt->closeCursor();
            }
            catch(\PDOException $e)	{
                $data['error'] = \Config\Database\DBErrorName::$query;
            }
            return $data;
        }

        public function update($id, $name){
            $data = array();
            if($this->pdo === null){
                $data['error'] = \Config\Database\DBErrorName::$connection;
                return $data;
            }
            if($id === null || $name === null){
                $data['error'] = \Config\Database\DBErrorName::$empty;
                return $data;
            }
            try	{
                $stmt = $this->pdo->prepare('UPDATE  `'.\Config\Database\DBConfig::$tableCategory.'` SET
                `'.\Config\Database\DBConfig\Category::$name.'`=:name WHERE `'
                    .\Config\Database\DBConfig\Category::$id.'`=:id');
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                $stmt->bindValue(':name', $name, PDO::PARAM_STR);

                $result = $stmt->execute();
                $rows = $stmt->rowCount();
                if(!$result)
                    $data['error'] = \Config\Database\DBErrorName::$nomatch;
                else
                    $data['message'] = \Config\Database\DBMessageName::$updateok;
                $stmt->closeCursor();
            }
            catch(\PDOException $e)	{
                $data['error'] = \Config\Database\DBErrorName::$query;
            }
            return $data;
        }

    }
