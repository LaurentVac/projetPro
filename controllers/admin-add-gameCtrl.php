<?php
session_start();
$background = 'bgHomePage';
include(dirname(__FILE__).'/../utils/regexp.php');
require_once(dirname(__FILE__).'/../utils/Database.php');
require_once(dirname(__FILE__).'/../models/Studio.php');
require_once(dirname(__FILE__).'/../models/Platform.php');
require_once(dirname(__FILE__).'/../models/Game.php');
require_once(dirname(__FILE__).'/../models/Provide.php');
require_once(dirname(__FILE__).'/../models/Picture.php');
require_once(dirname(__FILE__) . '/../utils/config.php');
$errorsArray = [];

//instantiation 
$studio = new Studio();
$listStudio = $studio->getAllStudio();

$platform = new Platform();
$listPlatform = $platform->getAllPlatform();
var_dump($_POST);


    //nettoyage du champ titre de jeu

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //nettoyage du champ titre de jeu
        $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING));
        if(empty($title)){
            $errorsArray['error_title'] = 'Merci de remplir le champ';
        }
        $synopsis = trim(filter_input(INPUT_POST, 'synopsis', FILTER_SANITIZE_STRING));
        if(empty($synopsis)){
            $errorsArray['error_synopsis'] = 'Merci de remplir le champ';
        }
        //nettoyage du champ studio
        $id_studio = intval(trim(filter_input(INPUT_POST, 'studioName', FILTER_SANITIZE_NUMBER_INT)));
        if(!empty($id_studio)){
            
                if(!$studio->getId($id_studio)){
                    $errorsArray['error_id_studio'] = 'Merci de choisir un studio valide';
                }
            
        }else{
            $errorsArray['error_id_studio'] = 'Merci de remplir le champ';
        }
        $note = intval(trim(filter_input(INPUT_POST, 'note', FILTER_SANITIZE_NUMBER_INT)));
        if($note < 0 && $note > 20){
            $errorsArray['error_note'] = 'La note doit être entre 0 et 20';
        }
        if(empty($note)){
            $errorsArray['error_note'] = 'Merci de remplir le champ';
        }
     
        //nettoyage du champ date de sortie
        $releaseDate = trim(filter_input(INPUT_POST, 'releaseDate', FILTER_SANITIZE_STRING));
        if(!empty($releaseDate)){

            $testRegex = preg_match( REGEXP_DATE ,$releaseDate);
            if(!$testRegex){
                $errorsArray['error_releaseDate']='Vous devez choisir une date valide';
            }
        }else{
            $errorsArray['error_releaseDate']= 'Merci de remplir le champ';
        }

        
        //nettoyage du champ plateforme
        foreach($_POST['platform'] as $key=>$value){
            
                $idPlatform[$key] = intval($value);
                var_dump($idPlatform);
                }
 
        if(!empty($idPlatform)){
            foreach($idPlatform as $key => $value){
                echo $value;
                $validId = $platform->getId($value);
                var_dump($validId);
                if(!$validId){
                    $errorsArray['form-idPlatform']= 'Données non valide';
                }
            }  

        }else{
            $errorsArray['error_idPlatform'] = 'Le champ est vide, merci de choisir une plateforme';
        }
        
        //nettoyage du champ test
        $test = trim(filter_input(INPUT_POST, 'test', FILTER_SANITIZE_STRING));
        if(empty($test)){
            $errorsArray['error_test']= 'Merci de remplir le champ';
        }

        $iframeYoutube = trim(filter_input(INPUT_POST, 'iframeYoutube', FILTER_SANITIZE_STRING));
        if(!empty($iframeYoutube)){
            $testRegex= preg_match(REGEXP_IFRAMEYOUTUBE, $iframeYoutube);
            if(!$testRegex){
                $errorsArray['error_youtube']='Merci de rentrer un lien youtube';
            }

        }else{
            $errorsArray['error_iframeYoutube'] = 'Merci de remplir le champ';
        }
      
        //nettoyage du champ les +
        $asset1 = trim(filter_input(INPUT_POST, 'asset1', FILTER_SANITIZE_STRING));
        $asset2 = trim(filter_input(INPUT_POST, 'asset2', FILTER_SANITIZE_STRING));
        $asset3 = trim(filter_input(INPUT_POST, 'asset3', FILTER_SANITIZE_STRING));
        $asset4 = trim(filter_input(INPUT_POST, 'asset4', FILTER_SANITIZE_STRING));
        
        if(empty($asset1) || empty($asset2) ||empty($asset3) ||empty($asset4)){
            $errorsArray['error_asset'] = 'Merci de remplir tout les champs atout';
        }
        
        //nettoyage du champ les -
        $default1 = trim(filter_input(INPUT_POST, 'default1', FILTER_SANITIZE_STRING));
        $default2 = trim(filter_input(INPUT_POST, 'default2', FILTER_SANITIZE_STRING));
        $default3 = trim(filter_input(INPUT_POST, 'default3', FILTER_SANITIZE_STRING));
        $default4 = trim(filter_input(INPUT_POST, 'default4', FILTER_SANITIZE_STRING));
        if(empty($default1) || empty($default2) ||empty($default3) ||empty($default4)){
            $errorsArray['error_default'] = 'Merci de remplir tout les champs default';
        }
 
        function isAuthorizedType($file){
            $finfo = finfo_open(FILEINFO_MIME_TYPE); // return mime-type extension
            $fileType = finfo_file($finfo, $file);
            // var_dump($fileType);
            finfo_close($finfo);
            return in_array($fileType, AUTHORIZED_TYPES);
        }
        
        function isAuthorizedSize($file){
            return $file<=AUTHORIZED_SIZE_MAX;
        }
  
        if(!empty($_FILES['imgCarousel'])){
            foreach($_FILES['imgCarousel']['error'] as $value){
                // var_dump($_FILES['imgCarousel']['error']);
                if($value  == 0){
                    //verification du type de fichier
                    foreach($_FILES['imgCarousel']['tmp_name'] as $key=>$value){
                        $isAuthorizedType = isAuthorizedType($value);//Type de fichier autorisé : png                               
                        if(!$isAuthorizedType){
                            $errorsArray["file"] = "Un des fichier n\'est pas autorisé pour le carousel, ex : png";
                        }
                    }
                    // verification de la taille de fichier
                    foreach($_FILES['imgCarousel']['size'] as $key=>$value){
                        $isAuthorizedSize = isAuthorizedSize($value);//Taille maxi est de 2 mo
                        if(!$isAuthorizedSize){
                            $errorsArray["file"] = "Taille maximale dépassée pour un des fichier du carousel, 2 Mo maxi";
                        }
                    }                   
                }else{
                    $errorsArray["file"] = "Un des fichier pour le carousel est vide ou invalide";
                }
            }
        }else {
            $errorsArray["file"] = "Fichier obligatoire";
        }
        if(!empty( $_FILES["imgMenu"])){
            if($_FILES["imgMenu"]['error'] == 0){
              //verification du type de fichier
                $tmp_nameImgMenu = $_FILES["imgMenu"]["tmp_name"];
                echo $tmp_nameImgMenu;
                $isAuthorizedType = isAuthorizedType($tmp_nameImgMenu);
                if(!$isAuthorizedType){
                    $errorsArray["file_menu"] = "Type de fichier non autorisé, ex : png"; 
                }
                // verification de la taille de fichier
                $sizeImgMenu = $_FILES["imgMenu"]["size"];
                $isAuthorizedSize = isAuthorizedSize($sizeImgMenu);
                if(!$sizeImgMenu){
                    $errorsArray["file_menu"] = "Type de fichier non autorisé, ex : png"; 
                }
            }else{
                $errorsArray["file_menu"] = "Fichier vide ou invalide";
            }
        }
        if(!empty( $_FILES["imgPrincipal"])){
            if($_FILES["imgPrincipal"]['error'] == 0){
                //verification du type de fichier
                  $tmp_nameImgPrincipal = $_FILES["imgPrincipal"]["tmp_name"];
                  echo $tmp_nameImgPrincipal;
                  $isAuthorizedType = isAuthorizedType($tmp_nameImgPrincipal);
                  if(!$isAuthorizedType){
                      $errorsArray["file_principal"] = "Type de fichier non autorisé, ex : png"; 
                  }
                  // verification de la taille de fichier
                  $sizeImgPrincipal = $_FILES["imgPrincipal"]["size"];
                  $isAuthorizedSize = isAuthorizedSize($sizeImgPrincipal);
                  if(!$sizeImgPrincipal){
                      $errorsArray["file_principal"] = "Type de fichier non autorisé, ex : png"; 
                  }
              }else{
                  $errorsArray["file_principal"] = "Fichier vide ou invalide";
              }
        }
       
    
        // début de la transaction
            if(empty($errorsArray)){
                $pdo = Database::connect();

                $pdo->beginTransaction();
                //ajout à la table game
                $game = new Game($title,
                                 $synopsis,
                                 $releaseDate,
                                 $test,
                                 $note,
                                 $iframeYoutube,
                                 $id_studio,
                                 $asset1,
                                 $asset2,
                                 $asset3,
                                 $asset4,
                                 $default1,
                                 $default2,
                                 $default3,
                                 $default4
                               );
                $addGame = $game->addGame();
                //récupère le dernier id créé
                $idGame = $pdo->lastInsertId();
                //ajout à la table provide
                $provide = new Provide();
                foreach($idPlatform as $key=>$value){
                    $addPlatform = $provide->addPlatformForGame($idGame, $value);
                }
            
                $lastId = [];
                $picture = new Picture($title , $idGame );
                //ajout de fichier image et rècupère les id
                foreach($_FILES['imgCarousel']['name'] as $key=> $value){               
                    $addPicture = $picture->addPicture($idGame);
                    $lastId[]= $pdo->lastInsertId();              
                }
                if($addGame == true && $addPlatform == true && $addPicture == true){
                    $pdo->commit();  
                    //si toute les requête se sont bien éxecuter alors les données sont envoyés en bdd les fichiers sont renommer et déplacés
                    $dest_file= dirname(__FILE__).'/../'.UPLOAD_DIR_CAROUSEL.'/';
                    foreach($_FILES['imgCarousel']['tmp_name'] as $key =>$value){
                        $tmp_name = $_FILES["imgCarousel"]["tmp_name"][$key];
                        $name = basename($lastId[$key]).'.png';
                        move_uploaded_file($tmp_name, $dest_file.$name);
                    }

                    $tmp_name = $_FILES["imgMenu"]["tmp_name"];
                    move_uploaded_file($tmp_name,dirname(__FILE__).'/../'.UPLOAD_DIR_MENU.'/'.$idGame.'.png');
        
                    $tmp_name = $_FILES["imgPrincipal"]["tmp_name"];
                    move_uploaded_file($tmp_name,dirname(__FILE__).'/../'.UPLOAD_DIR_MAIN.'/'.$idGame.'.png');

                }else{
                    $pdo->rollBack();
                }
                //fin de transaction
            }  
    }
var_dump($errorsArray);
include(dirname(__FILE__).'/../views/templates/header.php');

include(dirname(__FILE__).'/../views/admin-add-game.php');

include(dirname(__FILE__).'/../views/templates/footer.php');  

?>
