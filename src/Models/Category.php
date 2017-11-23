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
                $categories = array();
                $stmt = $this->pdo->query('SELECT * FROM `'.\Config\Database\DBConfig::$tableCategory.'`');
                while($row = $stmt -> fetch())
                {
                    $categories[$row['id']] = $row['name'];
                }
                $stmt->closeCursor();
                if($categories && !empty($categories))
                    $data['categories'] = $categories;
                else
                    $data['categories'] = array();
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

        //model zwraca wybraną kategorię
        public function getOne($id){
            $data = array();
            if($id === NULL)
                $data['error'] = 'Nieokreślone id!';
            else if(!$this->pdo)
                $data['error'] = 'Połączenie z bazą nie powidoło się!';
            else
                try
                {
                    $stmt = $this->pdo->prepare('SELECT * FROM `'.\Config\Database\DBConfig::$tableCategory.'` WHERE `'.\Config\Database\DBConfig\Category::$id.'`=:id');
                    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                    $result = $stmt->execute();
                    while($row = $stmt -> fetch())
                    {
                        $category[$row['id']] = $row['name'];
                    }
                    $stmt->closeCursor();
                    //czy istnieje kategoria o padanym id
                    if($result && $category && !empty($category)){
                        $data['categories'] = $category;
                    }
                    else
                    {
                        //$data['category'] = array();
                        $data['error'] = "Brak kategorii o id=$id!";
                    }

                }
                catch(\PDOException $e)
                {
                    $data['error'] = 'Błąd odczytu danych z bazy!';
                }
            return $data;
        }

        //model dodaje wybraną kategorię
        public function insert($name) {
            $data = array();
            if($name === NULL || $name === "")
                $data['error'] = \Config\Database\DBErrorName::$empty;
            else if(!$this->pdo)
                $data['error'] = \Config\Database\DBErrorName::$connection;
            else
                try
                {
                    $stmt = $this->pdo->prepare('INSERT INTO `'.\Config\Database\DBConfig::$tableCategory.'` (`'.\Config\Database\DBConfig\Category::$name.'`) VALUES (:name)');
                    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
                    $stmt->execute();
                    $stmt->closeCursor();
                }
                catch(\PDOException $e)
                {
                    $data['error'] = \Config\Database\DBErrorName::$noadd;
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
