<?php 
    class Database{
        private static $_pdo;
        public static function connect(){
            $dsn = 'mysql:dbname=myjvtest;host=localhost';
            $user = 'root';
            $password = '121722';
            try {
                if(is_null(self::$_pdo)){
                // connexion a la db 
                    self::$_pdo = new PDO($dsn, $user, $password);
                    //gestion des erreurs
                    self::$_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
                    self::$_pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE ,PDO::FETCH_OBJ) ;
                  
                }
            } catch (PDOException $e){
               echo 'Connexion échouée : ' . $e->getMessage();
               
            };
              return self::$_pdo;          
        }
    }

?>