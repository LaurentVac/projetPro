<?php
// 
     require_once(dirname(__FILE__).'/../utils/Database.php');
        class Picture {
            private $_id;
            private $_alt;
            private $_id_game;
         
            
            private $_pdo;
            
            public function __construct(  $alt = null, $idGame = null,$id = null ){
               
                $this->_alt = $alt;
                $this->_id_game = $idGame;
                $this->_id = $id;
                $this->_pdo = Database::connect();
            }

            public function getPicture($id){
                try {
                    $sql = 'SELECT * FROM `picture` WHERE `id_game` = :id_game;';
                       // préparation de la requête
                       $sth = $this->_pdo->prepare($sql);
                       $sth->bindValue(':id_game', $id, PDO::PARAM_INT);
                       $sth->execute();
                       $listpictures = $sth->fetchAll(PDO::FETCH_OBJ);
                       return $listpictures;
                }catch  (PDOException $e) {
                    
                    return false;
                }   
            }

            public function addPicture($id){
                try {
                    $sql = 'INSERT INTO `picture` (alt, id_game) VALUE (:alt, :id_game) ;';
                       // préparation de la requête
                       $sth = $this->_pdo->prepare($sql);
                       $sth->bindValue(':alt',$this->_alt,PDO::PARAM_STR);
                       $sth->bindValue(':id_game', $id,PDO::PARAM_INT);
                     
                       return $sth->execute();
                }catch  (PDOException $e) {
                    echo $e;
                    return false;
                }   
            }
            public function updatePicture($id){
                try {
                        $sql = 'UPDATE `picture` SET `alt` = :alt  WHERE `id_game` = :id AND id = :id;';
                       // préparation de la requête
                        $sth = $this->_pdo->prepare($sql);
                       
                        $sth->bindValue(':alt',$this->_alt,PDO::PARAM_STR);
                        $sth->bindValue(':id_game', $id,PDO::PARAM_INT);
                        $sth->bindValue(':id', $id,PDO::PARAM_INT);
                       return $sth->execute();
                }catch  (PDOException $e) {
                    echo $e;
                    return false;
                } 
            }
        }