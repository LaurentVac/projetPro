<?php
// 
     require_once(dirname(__FILE__).'/../utils/Database.php');
        class Game {
            private $_id;
            private $_title;
            private $_synopsis;
            private $_releaseDate;
            private $_test;
            private $_note;
            private $_iframeYoutube;
            // private $_displayTest;
            private $_id_studio;
            private $_asset1;
            private $_asset2;
            private $_asset3;
            private $_asset4;
            private $_default1;
            private $_default2;
            private $_default3;
            private $_default4;
            private $_pdo;
            
            public function __construct( $title = null,
                                         $synopsis= null,
                                         $releaseDate = null, 
                                         $test=null,
                                         $note = null,
                                         $iframeYoutube=null,
                                         $idStudio=null,
                                         $asset1 = null,
                                         $asset2 = null,
                                         $asset3 = null,
                                         $asset4 = null, 
                                         $default1=null,
                                         $default2=null,
                                         $default3=null,
                                         $default4=null,
                                         $id = null
                                        ){
               
                $this->_title = $title;
                $this->_synopsis = $synopsis;
                $this->_releaseDate = $releaseDate;
                $this->_test = $test;
                $this->_note = $note;
                $this->_iframeYoutube = $iframeYoutube;
                $this->_id_studio = $idStudio;
                $this->_asset1 = $asset1;
                $this->_asset2 = $asset2;
                $this->_asset3 = $asset3;
                $this->_asset4 = $asset4;
                $this->_default1 = $default1;
                $this->_default2 = $default2;
                $this->_default3 = $default3;
                $this->_default4 = $default4;

                $this->_id = $id;
                $this->_pdo = Database::connect();
            }

            public function readOneGame($id){
                try {
                    $sql = 'SELECT * FROM `game` WHERE `id` = :id ;';
                       // pr??paration de la requ??te
                       $sth = $this->_pdo->prepare($sql);
                       $sth->bindValue(':id',$id,PDO::PARAM_INT);
                       return $sth->fetch(PDO::FETCH_OBJ);
                       
                }catch  (PDOException $e) {
                    echo $e;
                    return false;
                }   
            }

           
            public function getOneTest($id){
                try {
                    $sql = 'SELECT * FROM `game` WHERE `id` = :id ;';
                       // pr??paration de la requ??te
                       $sth = $this->_pdo->prepare($sql);
                       $sth->bindvalue(':id', $id , PDO::PARAM_INT);
                       $sth->execute();
                       $test = $sth->fetch(PDO::FETCH_OBJ);
                       return $test;
                }catch  (PDOException $e) {
                    
                    return false;
                } 
            }
            public function get2LastGame(){
                try {
                    $sql = 'SELECT * FROM `game` ORDER BY `id` DESC LIMIT 2;';
                       // pr??paration de la requ??te
                       $sth = $this->_pdo->query($sql);
                       $listpictures = $sth->fetchAll(PDO::FETCH_OBJ);
                       return $listpictures;
                }catch  (PDOException $e) {
                    
                    return false;
                }   
            }
            public function addGame(){
                try {
                    $sql = 'INSERT INTO  `game` (title,synopsis,releaseDate,test,note,iframeYoutube,id_studio,asset1,asset2,asset3,asset4,default1,default2,default3,default4) 
                            VALUE ( :title, :synopsis, :releaseDate, :test, :note, :iframeYoutube, :idStudio, :asset1, :asset2, :asset3, :asset4, :default1, :default2, :default3, :default4)  ;';
                    // pr??paration de la requ??te
                    $sth = $this->_pdo->prepare($sql);
                    $sth->bindValue(':title',$this->_title,PDO::PARAM_STR);
                    $sth->bindValue(':synopsis',$this->_synopsis,PDO::PARAM_STR);
                    $sth->bindValue(':releaseDate',$this->_releaseDate,PDO::PARAM_STR);
                    $sth->bindValue(':test',$this->_test,PDO::PARAM_STR);
                    $sth->bindValue(':note',$this->_note,PDO::PARAM_INT);
                    $sth->bindValue(':iframeYoutube',$this->_iframeYoutube,PDO::PARAM_STR);
                    $sth->bindValue(':idStudio',$this->_id_studio,PDO::PARAM_INT);
                    $sth->bindValue(':asset1',$this->_asset1,PDO::PARAM_STR);
                    $sth->bindValue(':asset2',$this->_asset2,PDO::PARAM_STR);
                    $sth->bindValue(':asset3',$this->_asset3,PDO::PARAM_STR);
                    $sth->bindValue(':asset4',$this->_asset4,PDO::PARAM_STR);
                    $sth->bindValue(':default1',$this->_default1,PDO::PARAM_STR);
                    $sth->bindValue(':default2',$this->_default2,PDO::PARAM_STR);
                    $sth->bindValue(':default3',$this->_default3,PDO::PARAM_STR);
                    $sth->bindValue(':default4',$this->_default4,PDO::PARAM_STR);
                    return $sth->execute();
                       
                }catch  (PDOException $e) {
                    echo 'Connexion ??chou??e : ' . $e->getMessage();
                    return false;
                }   
            }
            public function listAllGame(){
                try {
                    $sql = 'SELECT * FROM `game`;';
                       // pr??paration de la requ??te
                       $sth = $this->_pdo->query($sql);           
                       $test = $sth->fetchAll(PDO::FETCH_OBJ);
                       return $test;
                }catch  (PDOException $e) {
                    
                    return false;
                } 
            }
            public function updateGame($id){
                try {
                    $sql = 'UPDATE  `game` SET `title` = :title, `synopsis` = :synopsis, `releaseDate` = :releaseDate, `test` = :test, `note` =:note, `iframeYoutube` = :iframeYoutube, `id_studio` =:idStudio, `asset1` =:asset1, `asset2` =:asset2, `asset3` = :asset3, `asset4` = :asset4, `default1` = :default1, `default2` =:default2, `default3` =:default3, `default4` =:default4 
                            WHERE `id` = :id ;';
                           
                    // pr??paration de la requ??te
                    $sth = $this->_pdo->prepare($sql);
                    $sth->bindValue(':title',$this->_title,PDO::PARAM_STR);
                    $sth->bindValue(':synopsis',$this->_synopsis,PDO::PARAM_STR);
                    $sth->bindValue(':releaseDate',$this->_releaseDate,PDO::PARAM_STR);
                    $sth->bindValue(':test',$this->_test,PDO::PARAM_STR);
                    $sth->bindValue(':note',$this->_note,PDO::PARAM_INT);
                    $sth->bindValue(':iframeYoutube',$this->_iframeYoutube,PDO::PARAM_STR);
                    $sth->bindValue(':idStudio',$this->_id_studio,PDO::PARAM_INT);
                    $sth->bindValue(':asset1',$this->_asset1,PDO::PARAM_STR);
                    $sth->bindValue(':asset2',$this->_asset2,PDO::PARAM_STR);
                    $sth->bindValue(':asset3',$this->_asset3,PDO::PARAM_STR);
                    $sth->bindValue(':asset4',$this->_asset4,PDO::PARAM_STR);
                    $sth->bindValue(':default1',$this->_default1,PDO::PARAM_STR);
                    $sth->bindValue(':default2',$this->_default2,PDO::PARAM_STR);
                    $sth->bindValue(':default3',$this->_default3,PDO::PARAM_STR);
                    $sth->bindValue(':default4',$this->_default4,PDO::PARAM_STR);
                    $sth->bindValue(':id',$id,PDO::PARAM_INT);
                    return $sth->execute();
                    
                } catch  (PDOException $e) {
                    echo 'Connexion ??chou??e : ' . $e->getMessage();
                    return false;
                }
            }

            public function deleteGame($id){
                try { 
                    $sql ='DELETE FROM `game` 
                    WHERE `id` = :id;';
                    $sth = $this->_pdo->prepare($sql);
                    $sth->bindValue(':id',$id,PDO::PARAM_INT);
                    return $sth->execute();
                } catch (PDOException $e) {
                    return false;
                }
            }

            
            public function paginationGame($page){
                try{
                    $sql = 'SELECT * FROM `patients` LIMIT :limite, 5 ;';
                    $query = $this->_pdo->prepare($sql);
                    // $query->bindValue(':limite', $limite, PDO::PARAM_INT);
                    /* ??? auquel il faut aussi lier la valeur, comme pour la limite */
                    $query->bindValue(':limite', $page, PDO::PARAM_INT);
                    /* Le reste se passe comme auparavant */
                     $query->execute();
                    return($query->fetchAll());
                }catch (PDOException $e) {
                    return false ;
                }
            }
            public static function getAll($search='', $limit=null, $offset=0){
        
                try{
                    if(!is_null($limit)){ // Si une limite est fix??e, il faut tout lister
                        $sql = 'SELECT * FROM `game` 
                        WHERE `title` LIKE :search 
                         
                        LIMIT :limit OFFSET :offset;';
                    } else {
                        $sql = 'SELECT * FROM `game` 
                        WHERE `title` LIKE :search ;';
                    }
        
                    $pdo = Database::connect();
        
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindValue(':search','%'.$search.'%',PDO::PARAM_STR);
                    
                    if(!is_null($limit)){
                        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
                        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
                    }
                    
                    $stmt->execute();
                    return($stmt->fetchAll());
                }
                catch(PDOException $e){
                    return false;
                }
        
            }
            public static function count($s){
                $pdo = Database::connect();
                try{
                    $sql = 'SELECT * FROM `game`
                        WHERE `title` LIKE :search ;';
        
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindValue(':search','%'.$s.'%',PDO::PARAM_STR);
                    $stmt->execute();
                    return($stmt->rowCount());
                }
                catch(PDOException $e){
                    return 0;
                }
                
            }
        }