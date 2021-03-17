<?php
session_start();
require_once(dirname(__FILE__).'/../utils/Database.php');
require_once(dirname(__FILE__).'/../models/User.php');
require_once(dirname(__FILE__).'/../models/Game.php');
$user = new User();
$game = new Game();

$idUser = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
$idGame = intval(filter_input(INPUT_GET, 'idGame', FILTER_SANITIZE_NUMBER_INT));

if($id){
    $deleteUser = $user->anonymizeUser($idUser);
}
if($idGame){
    $deleteGame = $game->deleteGame($idGame);
}


if(isset($deleteUser)&& $deleteUser ==true){
     header('location: /controllers/management-userCtrl.php');
}
if(isset($deleteGame)&& $deleteGame ==true){
    header('location: /controllers/management-userCtrl.php');
}