<?php
 session_start();
 require_once(dirname(__FILE__).'/../utils/regexp.php');
 require_once(dirname(__FILE__).'/../models/Game.php');
    $errorsArray = array();
    $usersArray =[];
    $success= null;
    $error = null;
var_dump($_SESSION);
$background = 'bgHomePage';
$game = new Game ();
$listGame = $game->listAllGame();
    
 var_dump($_FILES['imgCarousel'] )  ; 
include(dirname(__FILE__).'/../views/templates/header.php');

include(dirname(__FILE__).'/../views/admin-add-img.php');

include(dirname(__FILE__).'/../views/templates/footer.php');   

//var_dump($usersArray);
//  include(dirname(__FILE__).'fichier atrouver');
?>