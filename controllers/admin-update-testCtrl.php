<?php
session_start();
$background = 'bgHomePage';
include(dirname(__FILE__).'/../utils/regexp.php');
require_once(dirname(__FILE__).'/../utils/Database.php');
require_once(dirname(__FILE__).'/../models/User.php');
require_once(dirname(__FILE__).'/../models/Studio.php');
require_once(dirname(__FILE__).'/../models/Platform.php');
require_once(dirname(__FILE__).'/../models/Game.php');
require_once(dirname(__FILE__).'/../models/Provide.php');
require_once(dirname(__FILE__).'/../models/Picture.php');
$errorsArray = [];

$game = new Game();
$id = intval($_GET['id']);
$displayGame = $game->getOneTest($id);
echo $displayGame->note;
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
        if(empty($id_studio)){
            $errorsArray['error_id_studio'] = 'Merci de remplir le champ';
        }
        $note = intval(trim(filter_input(INPUT_POST, 'note', FILTER_SANITIZE_NUMBER_INT)));
        if(empty($note)){
            $errorsArray['error_note'] = 'Merci de remplir le champ';
        }
     
        //nettoyage du champ date de sortie
        $releaseDate = trim(filter_input(INPUT_POST, 'releaseDate', FILTER_SANITIZE_STRING));
        if(empty($test)){
            $errorsArray['error_releaseDate ']= 'Merci de remplir le champ';
        }

        
        //nettoyage du champ plateforme

        $idPlatform = intval(trim(filter_input(INPUT_POST, 'platform', FILTER_SANITIZE_NUMBER_INT)));
        
        if(empty($idPlatform)){
            $errorsArray['error_idPlatform'] = 'Le champ est vide, merci de choisir une plateforme';

        }
        
        //nettoyage du champ test
        $test = trim(filter_input(INPUT_POST, 'test', FILTER_SANITIZE_STRING));
        if(empty($test)){
            $errorsArray['error_test']= 'Merci de remplir le champ';
        }

        $iframeYoutube = trim(filter_input(INPUT_POST, 'iframeYoutube', FILTER_SANITIZE_STRING));
        if(empty($iframeYoutube)){
            $errorsArray['error_iframeYoutube'] = 'Merci de remplir le champ';
        }
      
        //nettoyage du champ les +
        $asset1 = trim(filter_input(INPUT_POST, 'asset1', FILTER_SANITIZE_STRING));
        $asset2 = trim(filter_input(INPUT_POST, 'asset2', FILTER_SANITIZE_STRING));
        $asset3 = trim(filter_input(INPUT_POST, 'asset3', FILTER_SANITIZE_STRING));
        $asset4 = trim(filter_input(INPUT_POST, 'asset4', FILTER_SANITIZE_STRING));
        if(empty($asset1) || empty($asset2) ||empty($asset3) ||empty($asset4)){
            $errorsArray['error_asset'] = 'Merci de remplir tout les champs atouts';
        }
        
        //nettoyage du champ les -
        $default1 = trim(filter_input(INPUT_POST, 'default1', FILTER_SANITIZE_STRING));
        $default2 = trim(filter_input(INPUT_POST, 'default2', FILTER_SANITIZE_STRING));
        $default3 = trim(filter_input(INPUT_POST, 'default3', FILTER_SANITIZE_STRING));
        $default4 = trim(filter_input(INPUT_POST, 'default4', FILTER_SANITIZE_STRING));
        if(empty($default1) || empty($default2) ||empty($default3) ||empty($default4)){
            $errorsArray['error_default'] = 'Merci de remplir tout les champs atouts';
        }
    //     $imgMenu =  trim(filter_input(INPUT_POST, 'imgMenu', FILTER_SANITIZE_STRING));
    //     $imgPrincipal= trim(filter_input(INPUT_POST, 'imgPrincipal', FILTER_SANITIZE_STRING));
    //     $imgCarousel = trim(filter_input(INPUT_POST, 'imgCarousel', FILTER_SANITIZE_STRING));
    //     $imgCarousel2 = trim(filter_input(INPUT_POST, 'imgCarousel2', FILTER_SANITIZE_STRING));
    //     $imgCarousel3 = trim(filter_input(INPUT_POST, 'imgCarousel3', FILTER_SANITIZE_STRING));
    //     $imgCarousel4 = trim(filter_input(INPUT_POST, 'imgCarousel4', FILTER_SANITIZE_STRING));
    //     if(empty($imgMenu) || empty($imgPrincipal) ||empty($imgCarousel) ||empty($imgCarousel2) ||empty($imgCarousel3) ||empty($imgCarousel4) ){
    //         $errorsArray['error_img'] = 'Merci de remplir tout les champs images';
    //     }

    // if($_FILES['imgMenu']['type'] != 'image/png'){
    //     $errorsArray['format_img'] = 'Le fichier ne correspond pas, l\'extension doit être .png';
    // }
    // if($_FILES['imgPrincipal']['type'] != 'image/png'){
    //     $errorsArray['format_img1'] = 'Le fichier ne correspond pas, l\'extension doit être .png';
    // }
    // if($_FILES['imgCarousel']['type'] != 'image/png'){
    //     $errorsArray['format_img2'] = 'Le fichier ne correspond pas, l\'extension doit être .png';
    // }
    // if($_FILES['imgCarousel2']['type'] != 'image/png'){
    //     $errorsArray['format_img3'] = 'Le fichier ne correspond pas, l\'extension doit être .png';
    // }
    // if($_FILES['imgCarousel3']['type'] != 'image/png'){
    //     $errorsArray['format_img4'] = 'Le fichier ne correspond pas, l\'extension doit être .png';
    // }
    // if($_FILES['imgCarousel4']['type'] != 'image/png'){
    //     $errorsArray['format_img5'] = 'Le fichier ne correspond pas, l\'extension doit être .png';
    // }
       
        // var_dump($_FILES['imgMenu']['type']);
        // var_dump($_FILES['imgPrincipal']['type']);
    
// début de la transaction

            $pdo = Database::connect();
            $pdo->beginTransaction();
            $game = new Game($title,$synopsis,$releaseDate,$test,$note,$iframeYoutube,$id_studio,$asset1,$asset2,$asset3,$asset4,$default1,$default2,$default3,$default4);
            $addGame = $game->updateGame($id);
            var_dump($addGame);
            $idGame = $pdo->lastInsertId();
            $platform = new Provide( $idGame , $idPlatform );
            $addPlatform = $platform->updatePlatform($id);
            var_dump($addPlatform);
            
            // $picture = new Picture($title , $idGame );
            // $addPicture = $picture->updatePicture($idGame);
           
            // $idPicture1 = $pdo->lastInsertId();
            
           
            // $addPicture = $picture->updatePicture($idGame);
            
            // $idPicture2 = $pdo->lastInsertId();
          

            // $addPicture = $picture->updatePicture($idGame);
            
            // $idPicture3 = $pdo->lastInsertId();
            
            //     $addPicture = $picture->updatePicture($idGame);
              
            //     $idPicture4 = $pdo->lastInsertId();
                
            if($addGame == true && $addPlatform == true ){
                $pdo->commit();

                // $tmp_name = $_FILES["imgCarousel"]["tmp_name"];
                // move_uploaded_file($tmp_name,dirname(__FILE__).'/../assets/img/carousel/'.$idPicture1.'.png');
                // $tmp_name = $_FILES["imgCarousel2"]["tmp_name"];
                // move_uploaded_file($tmp_name,dirname(__FILE__).'/../assets/img/carousel/'.$idPicture2.'.png');

                // $tmp_name = $_FILES["imgCarousel3"]["tmp_name"]; 
                // move_uploaded_file($tmp_name,dirname(__FILE__).'/../assets/img/carousel/'.$idPicture3.'.png');
                // $tmp_name = $_FILES["imgCarousel4"]["tmp_name"];
                // move_uploaded_file($tmp_name,dirname(__FILE__).'/../assets/img/carousel/'.$idPicture4.'.png');



                // $tmp_name = $_FILES["imgMenu"]["tmp_name"];
                // move_uploaded_file($tmp_name,dirname(__FILE__).'/../assets/img/menu/'.$idGame.'.png');
               
                
                
               
                // $tmp_name = $_FILES["imgPrincipal"]["tmp_name"];
                // move_uploaded_file($tmp_name,dirname(__FILE__).'/../assets/img/main/'.$idGame.'.png');

                // $name = basename($idPicture);

            }else{
                $pdo->rollBack();
            }

    }












include(dirname(__FILE__).'/../views/templates/header.php');

include(dirname(__FILE__).'/../views/admin-update-test.php');

include(dirname(__FILE__).'/../views/templates/footer.php');  

?>

