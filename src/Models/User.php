<?php
    namespace Models;
    use \PDO;
    use Config\Database\DBConfig as DB;

    class User extends Model{

        public function getAll(){
            if($this->pdo === null){
                $data['error'] = \Config\Database\DBErrorName::$connection;
                return $data;
            }
            $data = array();
            $data['users'] = array();
            try{
                $stmt = $this->pdo->query('SELECT * FROM `'.\Config\Database\DBConfig::$tableUser.'`');
                $users = $stmt->fetchAll();
                $stmt->closeCursor();
                if($users && !empty($users))
                    $data['users'] = $users;
            }
            catch(\PDOException $e){
                $data['error'] = \Config\Database\DBErrorName::$query;
            }
            return $data;
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
            $data['users'] = array();
            try{
                $stmt = $this->pdo->prepare('SELECT * FROM `'.\Config\Database\DBConfig::$tableUser.'` WHERE `'.\Config\Database\DBConfig\User::$id.'`=:id');
                $stmt -> bindValue(':id', $id, PDO::PARAM_INT);
                $result = $stmt->execute();
                $users = $stmt->fetchAll();
                $stmt->closeCursor();
                if($users && !empty($users))
                    $data['users'] = $users;
                else
                    $data['error'] = \Config\Database\DBErrorName::$nomatch;
            }
            catch(\PDOException $e){
                var_dump($e);
                $data['error'] = \Config\Database\DBErrorName::$query;
            }
            return $data;
        }

        public function add($name, $surname, $login, $password){
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
                $stmt = $this->pdo ->prepare('INSERT INTO `'.DB::$tableUser.'` (`'.DB\User::$name.'`, `'.DB\User::$surname.'`,`'.DB\User::$login.'`, `'.DB\User::$password.'`) 
                                                VALUES (:name, :surname, :login, :password)');

                $stmt -> bindValue(':name', $name, PDO::PARAM_STR);
                $stmt -> bindValue(':surname', $surname, PDO::PARAM_STR);
                $stmt -> bindValue(':login', $login, PDO::PARAM_STR);
                $stmt -> bindValue(':password', md5($password), PDO::PARAM_STR);
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
                $stmt = $this->pdo->prepare('DELETE FROM  `'.\Config\Database\DBConfig::$tableUser.'` WHERE  `'.\Config\Database\DBConfig\User::$id.'`=:id');
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

        public function update($id, $name, $surname, $login, $password){
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
                $stmt = $this->pdo->prepare(
                    'UPDATE  `'.\Config\Database\DBConfig::$tableUser.'` SET
                    `'.\Config\Database\DBConfig\User::$name.'`=:name, 
                    `'.\Config\Database\DBConfig\User::$surname.'`=:surname,
                    `'.\Config\Database\DBConfig\User::$login.'`=:login,
                    `'.\Config\Database\DBConfig\User::$password.'`=:password
                    WHERE `'
                    .\Config\Database\DBConfig\User::$id.'`=:id');
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                $stmt->bindValue(':name', $name, PDO::PARAM_STR);
                $stmt->bindValue(':surname', $surname, PDO::PARAM_STR);
                $stmt->bindValue(':login', $login, PDO::PARAM_STR);
                $stmt->bindValue(':password', md5($password), PDO::PARAM_STR);

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