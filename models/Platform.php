<?php
// 
     require_once(dirname(__FILE__).'/../utils/Database.php');
        class Platform {
            private $_id;
            private $_platform;
         
            
            private $_pdo;
            
            public function __construct(  $platform = null,$id = null ){
               
                $this->_platform = $platform;
                $this->_id = $id;
                $this->_pdo = Database::connect();
            }

            public function getAllPlatform(){
                try {
                    $sql = 'SELECT * FROM `platform` ;';
                       // préparation de la requête
                       $sth = $this->_pdo->query($sql);
                       $listplat= $sth->fetchAll(PDO::FETCH_OBJ);
                       return $listplat;
                }catch  (PDOException $e) {
                    
                    return false;
                }   
            }
            public function getId($id){
                try {
                    $sql = 'SELECT `id` FROM `platform` WHERE `id` = :id ;';
                       // préparation de la requête
                       $sth = $this->_pdo->prepare($sql);
                       $sth->bindValue(':id', $id,  PDO::PARAM_INT);
                       $sth->execute();
                       $plat= $sth->fetch();
                       return $plat;
                }catch  (PDOException $e) {
                    
                    return false;
                }   
            }
            public function getPlatformForGame($id){

                try {
                    $sql = 'SELECT * FROM `platform` 
                            INNER JOIN `provide` ON provide.id_platform = platform.id 
                            INNER JOIN game ON provide.id = game.id WHERE game.id = :id ;';
                       // préparation de la requête
                       $sth = $this->_pdo->prepare($sql);
                       $sth->bindvalue(':id', $id , PDO::PARAM_INT);
                       $sth->execute();
                       $test = $sth->fetchAll(PDO::FETCH_OBJ);
                       return $test;
                }catch  (PDOException $e) {
                    echo $e;
                    return false;
                } 
            }
            public function addPlatform(){
                try {
                    $sql =' INSERT INTO `provide` (`id` , `id_platform` ) VALUE (:id , :id_platform);';
                    $sth = $this->_pdo->prepare($sql);
                    $sth->bindvalue(':id', $this->_id, PDO::PARAM_INT);
                    $sth->bindvalue(':id_platform', $this->_id_platform, PDO::PARAM_INT);
                    return $sth->execute();
                    
                } catch  (PDOException $e) {
                    
                    return false;
                }
            }
            public function updatePlaform($id){
                try {
                    $sql =' UPDATE  `provide` SET  `id_platform` = :id_platform  WHERE `id`= :id;';
                    $sth = $this->_pdo->prepare($sql);
                    
                    $sth->bindvalue(':id_platform', $this->_id_platform, PDO::PARAM_INT);
                    $sth->bindvalue(':id', $id, PDO::PARAM_INT);
                    return $sth->execute();
                    
                } catch  (PDOException $e) {
                    
                    return false;
                }
            }
        }