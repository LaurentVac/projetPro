<?php
// 
     require_once(dirname(__FILE__).'/../utils/Database.php');
        class User {
            private $_id;
            private $_firstname;
            private $_lastname;
            private $_mail;
            private $_pseudo;
            private $_passwd;
            private $_created_at;
            private $_authorize;
            private $_admin;
            private $_deleted_at;
            
            private $_pdo;
            
            public function __construct(){
                $this->_pdo = Database::connect();
            }

            public function setFirstname($firstname){
                $this->_firstname = $firstname;
            }

            public function setLastname($lastname){
                $this->_lastname= $lastname;
            }
            
            public function setPseudo($pseudo){  
                $this->_pseudo = $pseudo;
            }
        
            public function setMail($mail){
                $this->_mail = $mail;
            }
        
            public function setPassword($passwd){
                $password_hash = password_hash($passwd, PASSWORD_DEFAULT);
                $this->_passwd = $password_hash;
            }
        
            public function isNotExistMail($mail){         
                if(isset($mail)){
                     $sql = 'SELECT COUNT(*) AS `mail` FROM `user` 
                            WHERE `mail` = ? ;';
                     $sth = $this->_pdo->prepare($sql);
                     $sth->execute([$mail]);
                     $mailExist = $sth->fetch(PDO::FETCH_ASSOC);
                     // var_dump($mailExist);
                     if($mailExist['mail'] == 0){
                         return true;
                     }else{
                         return false;
                     } 
                 }           
             }
             public function isNotExistPseudo($pseudo){         
                if(isset($pseudo)){
                     $sql = 'SELECT COUNT(*) AS `pseudo` FROM `user`
                            WHERE `pseudo` = ? ;';
                     $sth = $this->_pdo->prepare($sql);
                     $sth->execute([$pseudo]);
                     $pseudoExist = $sth->fetch(PDO::FETCH_ASSOC);
                     // var_dump($pseudoExist);
                     if($pseudoExist['pseudo'] == 0){
                         return true;
                     }else{
                         return false;
                     } 
                 }           
             }
             public function isAdmin(){
                try{
                    $sql = 'SELECT *  FROM `user`
                            WHERE `admin` = 1 ;';
                    $sth = $this->_pdo->query($sql);
                    return $sth->fetch();               
                } catch (PDOException $e) {                    
                    return false;
                }   
             }
            
        
            public  function addUser(){     
                try{
                    $sql = "INSERT INTO `user` (firstname, lastname, mail, pseudo, passwd )
                            VALUES (:firstname, :lastname, :mail, :pseudo, :passwd);";
            
                    // préparation de la requête
                    $sth = $this->_pdo->prepare($sql);
                    // association des marqueurs nominatif via méthode bindvalue
                    $sth->bindValue(':firstname', $this->_firstname, PDO::PARAM_STR);
                    $sth->bindValue(':lastname', $this->_lastname, PDO::PARAM_STR);
                    $sth->bindValue(':mail', $this->_mail, PDO::PARAM_STR);
                    $sth->bindValue(':pseudo', $this->_pseudo, PDO::PARAM_STR);
                    $sth->bindValue(':passwd', $this->_passwd, PDO::PARAM_STR);

                    $result = $sth->execute();
                    var_dump($result);
                    // $this->_last_id = $this->_pdo->lastInsertId();
                    return $result;                          
                }catch (PDOException $e) {
                    
                    return false;
                }           
            }
            public function listUsers(){
                try {
                    $sql = 'SELECT * FROM `user`;';
                    // préparation de la requête
                    $sth = $this->_pdo->query($sql);
                    $listUser = $sth->fetchAll(PDO::FETCH_OBJ);
                    return $listUser;
                }catch  (PDOException $e) {
                    
                    return false;
                }           
            }
            //méthode de connexion au compte utilisateur
            public function getUserLogin($mail, $password){

                $sql = "SELECT *  FROM `user` 
                        WHERE `mail` = :mail ;";
                $stmt = $this->_pdo->prepare($sql);
        
                // association des paramètres  
                $stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
                if($stmt->execute()){ // envoie de la requête
                    $user = $stmt->fetch();
                    if($user){
                        // retourne l'id user si le mot de passe est vérifié
                        if(password_verify($password, $user->passwd)){
                            return $user;
                        } 
                    }
                }
                return false;
            }

            public function profilUser($id){
                try {
                    $sql = 'SELECT * FROM `user`
                            WHERE `mail` = :id ;';
                       // préparation de la requête
                       $sth = $this->_pdo->prepare($sql);
                       $sth->bindValue(':id',$id,PDO::PARAM_STR);
                       $sth->execute();
                       return $sth->fetch(PDO::FETCH_OBJ);
                       
                }catch  (PDOException $e) {
                    echo $e;
                    return false;
                }  
            }
             public function updateLastname($id){
                try {
                    $sql = 'UPDATE  `user` SET `lastname` = :lastname
                            WHERE `mail`= :id ;';
                       // préparation de la requête
                       $sth = $this->_pdo->prepare($sql);
                       $sth->bindValue(':lastname', $this->_lastname, PDO::PARAM_STR);
                       $sth->bindValue(':id', $id, PDO::PARAM_STR);
                       $listUser = $sth->execute();
                       return $listUser;
                }catch  (PDOException $e) {
                    
                    return false;
                }
            }
            public function updateFirstname($id){
                try {
                    $sql = 'UPDATE  `user` SET `firstname` = :firstname 
                            WHERE `mail`= :id ;';
                       // préparation de la requête
                       $sth = $this->_pdo->prepare($sql);
                       $sth->bindValue(':firstname', $this->_firstname, PDO::PARAM_STR);
                       $sth->bindValue(':id', $id, PDO::PARAM_STR);
                       $listUser = $sth->execute();
                       return $listUser;
                }catch  (PDOException $e) {
                   
                    return false;
                }
            }
            public function updatePseudo($id){
                try {
                    $sql = 'UPDATE  `user` SET `pseudo` = :pseudo 
                            WHERE `mail`= :id ;';
                       // préparation de la requête
                       $sth = $this->_pdo->prepare($sql);
                       $sth->bindValue(':pseudo', $this->_pseudo, PDO::PARAM_STR);
                       $sth->bindValue(':id', $id, PDO::PARAM_STR);
                       $listUser = $sth->execute();
                       return $listUser;
                }catch  (PDOException $e) {                  
                    return false;
                }
            }
            public function updateMail($id){
                try {
                    $sql = 'UPDATE  `user` SET `mail` = :mail 
                            WHERE `mail`= :id ;';
                       // préparation de la requête
                       $sth = $this->_pdo->prepare($sql);
                       $sth->bindValue(':mail', $this->_mail, PDO::PARAM_STR);
                       $sth->bindValue(':id', $id, PDO::PARAM_STR);
                       $listUser = $sth->execute();
                       return $listUser;
                }catch  (PDOException $e) {
                    
                    return false;
                }
            }
            public function updatePassword($id){
                try {
                    $sql = 'UPDATE  `user` SET `passwd` = :passwd 
                            WHERE `mail`= :id ;';
                       // préparation de la requête
                       $sth = $this->_pdo->prepare($sql);
                       $sth->bindValue(':passwd', $this->_passwd, PDO::PARAM_STR);
                       $sth->bindValue(':id', $id, PDO::PARAM_STR);
                       return $sth->execute();
                }catch  (PDOException $e) {
                    
                    return false;
                }
            }
        }