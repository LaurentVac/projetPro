<?php
session_start();
$background = 'bgHomePage';
require_once(dirname(__FILE__).'/../models/User.php');
require_once(dirname(__FILE__).'/../models/Studio.php');
require_once(dirname(__FILE__).'/../models/Platform.php');

$user = new User ();
$listUser = $user->listUsers();

$studio = new Studio();
$listStudio = $studio->getAllStudio();

$platform = new Platform();
$listPlatform = $platform->getAllPlatform();





include(dirname(__FILE__).'/../views/templates/header.php');

include(dirname(__FILE__).'/../views/admin-game-list.php');

include(dirname(__FILE__).'/../views/templates/footer.php');  

?>