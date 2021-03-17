<?php
 session_start();
 require_once(dirname(__FILE__).'/../utils/regexp.php');
 require_once(dirname(__FILE__).'/../models/Game.php');
 require_once(dirname(__FILE__).'/../models/Picture.php');

    $errorsArray = array();
    $usersArray =[];
    $success= null;
    $error = null;

$background = 'bgHomePage';


        $game = new Game ();
        $listGame = $game->listAllGame();
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $idGame = intval($_POST['studioName']);
            
        }
 


 //********************************* */



require(dirname(__FILE__) . '/../utils/config.php');

function isAuthorizedType($file){
    $finfo = finfo_open(FILEINFO_MIME_TYPE); // return mime-type extension
    $fileType = finfo_file($finfo, $file);
    var_dump($fileType);
    finfo_close($finfo);
    return in_array($fileType, AUTHORIZED_TYPES);
}

function isAuthorizedSize($file){
    return $file<=AUTHORIZED_SIZE_MAX;
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_FILES['imgCarousel'])){
        foreach($_FILES['imgCarousel']['error'] as $value){
            
            
            if($value  == 0){
                foreach($_FILES['imgCarousel']['tmp_name'] as $key=>$value){
                    $isAuthorizedType = isAuthorizedType($value );                               
                    if(!$isAuthorizedType){
                        $errorsArray["file"] = "Type de fichier non autorisé";
                    }
                }
                foreach($_FILES['imgCarousel']['size'] as $key=>$value){

                    $isAuthorizedSize = isAuthorizedSize($value);
                    if(!$isAuthorizedSize){
                        $errorsArray["file"] = "Taille maximale dépassée";
                    }
                }
               
            }else {
                $errorsArray["file"] = "Le fichier n'est pas valide";
            }
        }
        
            if(empty($errorsArray)){
                $pdo = Database::connect();
                $picture = new Picture( $idGame );
                
                    
                // COPIE ET DEPLACE **********************
                // $src_file = $_FILES['imgMenu']['tmp_name'];
                // $dest_file = dirname(__FILE__).'/../'.UPLOAD_DIR_MENU.'/'.$idGame.'.png';
                // move_uploaded_file($src_file, $dest_file);

                // $src_file = $_FILES['imgPrincipal']['tmp_name'];
                // $dest_file = dirname(__FILE__).'/../'.UPLOAD_DIR_MAIN.'/'.$idGame.'.png';
                // move_uploaded_file($src_file, $dest_file);

                foreach($_FILES['imgCarousel']['tmp_name'] as $key =>$value){
                   $addpicture =  $picture->addPicture($idGame);
                   if($addpicture){
                        $src_file = $value;
                        $dest_file = dirname(__FILE__).'/../'.UPLOAD_DIR_CAROUSEL.'/'.$pdo->lastInsertId().'.png';
                        move_uploaded_file($src_file, $dest_file);
                   }else{
                    $errorsArray["file"] = "Erreur lors du transfert ";
                   }
                }
            }
                // $src = UPLOAD_DIR_MENU.'/picture1.jpg'; //URL A UTILISER DANS LA VUE
                
                //*****************************************

                // COPIE ET REDIMENSIONNE ******************
                // $filename = $dest_file;
                // $ressource_source = imagecreatefromjpeg($filename);
                // $result = getimagesize($filename);
                // $src_w = $result[0];
                // $src_h = $result[1];
                
                // $src_x = 0;
                // $src_y = 0;

                // $dst_x = 0;
                // $dst_y = 0;
                
                // $dst_h = 100;
                // $dst_w = ($dst_h*$src_w)/$src_h;
                 
                // var_dump($dst_w);
                // $ressource_resampled = imagecreatetruecolor($dst_w, $dst_h);
                // imagecopyresampled($ressource_resampled, $ressource_source, $dst_x, $dst_y, $src_x, $src_y, $dst_w, $dst_h, $src_w, $src_h);

                // $dest_src_resampled = dirname(__FILE__).'/../'.UPLOAD_DIR_PROFILES.'/picture1-resampled.jpg';
                // imagejpeg($ressource_resampled, $dest_src_resampled, 100);

                // $src_resampled = UPLOAD_DIR_PROFILES.'/picture1-resampled.jpg'; // URL A UTILISER DANS LA VUE
                // //*****************************************

                // // COPIE ET CROP ******************
                // $width_croped = $dst_h;
                // $height_croped = $dst_h;
                // $rect = ['x' => 0, 'y' => 0, 'width' => $width_croped, 'height' => $height_croped]; //array
                // $ressource_croped = imagecrop($ressource_resampled, $rect);

                // $dest_src_croped = dirname(__FILE__).'/../'.UPLOAD_DIR_PROFILES.'/picture1-croped.jpg';
                // imagejpeg($ressource_croped, $dest_src_croped, 100);

                // $src_croped = UPLOAD_DIR_PROFILES.'/picture1-croped.jpg'; // URL A UTILISER DANS LA VUE
                // //*****************************************
            
        
                } else {
                        $errorsArray["file"] = "Erreur lors du transfert";
                    }
    
            } else {
                $errorsArray["file"] = "Fichier obligatoire";
            }
    
    
        
    

    



echo  $errorsArray["file"] ;
include(dirname(__FILE__).'/../views/templates/header.php');

include(dirname(__FILE__).'/../views/admin-add-img.php');

include(dirname(__FILE__).'/../views/templates/footer.php');   

//var_dump($usersArray);
//  include(dirname(__FILE__).'fichier atrouver');
?>