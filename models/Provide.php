<?php
// 
     require_once(dirname(__FILE__).'/../utils/Database.php');
        class Provide {
            private $_id;
            
            private $_id_platform;
         
            
            private $_pdo;
            
            public function __construct(  $id = null, $idPlatform = null ){
               
             
                $this->_id = $id;
                $this->_id_platform= $idPlatform;
                $this->_pdo = Database::connect();
            }

            public function addPlatformForGame($id,$idPlatform = null){
                try {
                    var_dump($id,$this->_id_platform);
                    $sql = 'INSERT INTO `provide` (`id`, `id_platform`) VALUE ( :id , :id_platform);';
                    $sth = $this->_pdo->prepare($sql);
                    $sth->bindValue(':id',$id, PDO::PARAM_INT);
                    $sth->bindValue(':id_platform',$idPlatform, PDO::PARAM_INT);
                    return $sth->execute();
                } catch  (PDOException $e) {
                    echo 'Connexion échouée : ' . $e->getMessage();
                    return false;
                } 
            }
            public function updatePlatform($id){
                try {
                    $sql = 'UPDATE `provide` SET `id_platform` = :id_platform WHERE `id` = :id;';
                    $sth = $this->_pdo->prepare($sql);
                    $sth->bindValue(':id',$id, PDO::PARAM_INT);
                    $sth->bindValue(':id_platform',$this->_id_platform, PDO::PARAM_INT);
                    return $sth->execute();
                } catch  (PDOException $e) {
                    echo 'Connexion échouée : ' . $e->getMessage();
                    return false;
                } 
            }
        }
