<?php
// 
     require_once(dirname(__FILE__).'/../utils/Database.php');
        class Comment {
            private $_id;
            private $_comment;
       
            private $_created_at;
            private $_deleted_at;
            private $_id_user;
            private $_id_game;
            
            private $_pdo;
            
            public function __construct(){
               
                $this->_pdo = Database::connect();
            }
            public function setComment($comment){
                $this->_comment = $comment;
            }
          

            public function setIdUser($idUser){
                $this->_idUser= $idUser;
            }
            public function addComment($idUser,$idGame){
                try{
                    $sql = "INSERT INTO `comment` (comment,id_user,id_game )
                         VALUES (:comment, :id_user, :id_game);";
            
                    // préparation de la requête
                    $sth = $this->_pdo->prepare($sql);

                    // association des marqueurs nominatif via méthode bindvalue
                    $sth->bindValue(':comment', $this->_comment, PDO::PARAM_STR);
                    $sth->bindValue(':id_user', $idUser, PDO::PARAM_STR);
                    $sth->bindValue(':id_game', $idGame, PDO::PARAM_STR);
                   

                    $result = $sth->execute();
                    var_dump($result);
                    // $this->_last_id = $this->_pdo->lastInsertId();
                    return $result;                          
                }catch (PDOException $e) {
                    
                    return false;
                }
            }
                
            public function displayComment($idGame){
                try{
                        $sql = 'SELECT `comment`.`comment`, `user`.`pseudo`, `comment`.`id_game` FROM `comment`
                                INNER JOIN `user` ON `comment`.`id_user` = `user`.`id`
                                INNER JOIN `game` ON `comment`.`id_game` = `game`.`id`
                                WHERE `comment`.`id_game` = :idGame;';                       
                        // préparation de la requête
                        $sth = $this->_pdo->prepare($sql);                          
                        $sth->bindValue(':idGame', $idGame, PDO::PARAM_INT);
                        $sth->execute();
                        $result = $sth->fetchAll(PDO::FETCH_OBJ);
                      
                        // $this->_last_id = $this->_pdo->lastInsertId();
                        return $result;                          
                }catch (PDOException $e) {
                    echo $e;
                    return false;
                }
            }
            
        }
           
        
            
        