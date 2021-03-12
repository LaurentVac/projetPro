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
    $id = intval($_POST['game']);
    $idPlatform = $_POST['platform'];
    $provide = new Provide ($id);
    var_dump($_POST['platform']);
   
    foreach($idPlatform as $platform => $value){
         $provide->addPlatformForGame($id,$value);
    }   
}





include(dirname(__FILE__).'/../views/templates/header.php');

include(dirname(__FILE__).'/../views/admin-add-platform.php');

include(dirname(__FILE__).'/../views/templates/footer.php');  

?>