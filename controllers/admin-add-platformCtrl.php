<?php
session_start();
$background = 'bgHomePage';
include(dirname(__FILE__).'/../utils/regexp.php');

require_once(dirname(__FILE__).'/../models/Platform.php');
require_once(dirname(__FILE__).'/../models/Game.php');
require_once(dirname(__FILE__).'/../models/Provide.php');

$errorsArray = [];

$game = new Game();
$listGame = $game->listAllGame();

$platform = new Platform ();
$listPlatform = $platform->getAllPlatform();
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(!empty($_POST['game']) && !empty($_POST['platform'])){
        $id = intval($_POST['game']);
        $idPlatform = $_POST['platform'];
        $provide = new Provide ($id);
        foreach($idPlatform as $key => $value){
            $validId = $platform->getId($value);
            if($validId){
                $provide->addPlatformForGame($id,$value);
            }else{
                $errorsArray['form-error']= 'Données non valide';
            }
        }  
    }else{
        $errorsArray['form-error']= 'Merci de remplir tout les champs';
    } 
}
var_dump($errorsArray);





include(dirname(__FILE__).'/../views/templates/header.php');

include(dirname(__FILE__).'/../views/admin-add-platform.php');

include(dirname(__FILE__).'/../views/templates/footer.php');  

?>