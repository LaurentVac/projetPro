<?php

$background = 'bgHomePage';
include(dirname(__FILE__).'/../utils/regexp.php');

require_once(dirname(__FILE__).'/../models/Platform.php');
require_once(dirname(__FILE__).'/../models/Game.php');
require_once(dirname(__FILE__).'/../models/Provide.php');
require_once(dirname(__FILE__).'/../models/User.php');
$errorsArray = [];

    $idGame = intval(filter_input(INPUT_GET, 'idGame', FILTER_SANITIZE_NUMBER_INT));
    $game = new Game();
    $listGame = $game->getOneTest($idGame);
    if(isset($_GET['idGame'])){
        if(!$listGame){
            header('location: /controllers/admin-listTestCtrl.php');
        }
    }
   
        
    
    $idUser = intval(trim(filter_input(INPUT_GET, 'idUser', FILTER_SANITIZE_NUMBER_INT)));
    $user = new User();
    // $validIdUser = $user->getIdUser($idUser);
        
    $getUser = $user->profilUserForAdmin($idUser);
    if(isset($_GET['idUser'])){
        if(!$getUser){
            header('location: /controllers/management-userCtrl.php');
        }
    }
    










include(dirname(__FILE__).'/../views/templates/header.php');


if(isset($_GET['idUser'])){
    include(dirname(__FILE__).'/../views/admin-confirm-delete-user.php');
}
if(isset($_GET['idGame'])){
    include(dirname(__FILE__).'/../views/admin-confirm-delete-game.php');
}


include(dirname(__FILE__).'/../views/templates/footer.php');  
