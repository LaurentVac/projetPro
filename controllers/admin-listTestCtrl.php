<?php
session_start();
$background = 'bgHomePage';
require_once(dirname(__FILE__).'/../models/Game.php');


$game = new Game();
$listGame = $game->listAllGame();









include(dirname(__FILE__).'/../views/templates/header.php');

include(dirname(__FILE__).'/../views/admin-listTest.php');

include(dirname(__FILE__).'/../views/templates/footer.php');  

?>