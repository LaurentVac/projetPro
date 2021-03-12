<?php
session_start();
$background = 'bgHomePage';

require_once(dirname(__FILE__).'/../models/Studio.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $studioName = trim(filter_input(INPUT_POST,'studio',FILTER_SANITIZE_STRING));

    $studio = new Studio($studioName);
    $addStudio= $studio->addStudio();
    if($addStudio){
        header('location: /controllers/adminCtrl.php');
    }
}






include(dirname(__FILE__).'/../views/templates/header.php');

include(dirname(__FILE__).'/../views/admin-add-studio.php');

include(dirname(__FILE__).'/../views/templates/footer.php');  

?>