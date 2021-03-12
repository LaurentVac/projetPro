<?php
session_start();
    $background = 'bgMario';
require_once(dirname(__FILE__).'/../models/Game.php');
require_once(dirname(__FILE__).'/../models/Picture.php');
require_once(dirname(__FILE__).'/../models/Studio.php');
require_once(dirname(__FILE__).'/../models/Platform.php');
require_once(dirname(__FILE__).'/../models/User.php');
require_once(dirname(__FILE__).'/../models/Comment.php');
$idGame = intval($_GET['id']);
$errorsArray = [];
$test = new Game ();
$picture = new Picture ();
$studio = new Studio();
$platform = new Platform();
$displayTest = $test->getOneTest($idGame);
    if($displayTest){
        $displayPicture = $picture->getPicture($idGame);
        $displayStudio = $studio->getStudioForGame($idGame);
        $displayPlatform = $platform->getPlatformForGame($idGame);
    // var_dump($displayStudio);
    }else{
        header('location: /index.php');
    }


// var_dump($displayPlatform);
//********************************* */
        if($_SESSION){
            $mailUser = $_SESSION['mail'];
            $user = new User();
            $profilUser = $user->profilUser($mailUser);
            $idUser = $profilUser->id;
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $comment = trim(filter_input(INPUT_POST, 'comment',FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

                if(!$comment){
                    $errorsArray['error_comment']= 'Le champ est vide';
                }else{
                    $newComment = new Comment();
                    $setComment = $newComment->setComment($comment);
                    $addComment = $newComment->addComment($idUser,$idGame);
                }
            }
        }
$dispComment = new comment();
$displayComment = $dispComment->displayComment($idGame);
var_dump($displayComment);








  
include(dirname(__FILE__).'/../views/templates/header.php');

include(dirname(__FILE__).'/../views/test.php');

include(dirname(__FILE__).'/../views/templates/footer.php');   