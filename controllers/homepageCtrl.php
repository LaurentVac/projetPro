<?php 

session_start();
$background ='homepage';
require_once(dirname(__FILE__).'/../models/Game.php');

require_once(dirname(__FILE__).'/../models/User.php');

$game = new Game();
$lastGame = $game->get2LastGame();

$admin = new User();

var_dump($_SESSION);





include(dirname(__FILE__).'/../views/templates/header.php');

include(dirname(__FILE__).'/../views/templates/homepage.php');

include(dirname(__FILE__).'/../views/templates/footer.php');