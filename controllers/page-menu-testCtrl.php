<?php
$background = 'bgHomePage';
require_once(dirname(__FILE__) . '/../models/Game.php');
require_once(dirname(__FILE__) . '/../utils/config.php');

// Récupération de la valeur recherchée et on nettoie
$s = trim(filter_input(INPUT_GET, 's', FILTER_SANITIZE_STRING));

// On définit le nombre d'éléments par page grâce à une constante déclarée dans config.php
$limit = NB_ELEMENTS_BY_PAGE;

// Compte le nombre d'éléments au total selon la recherche
$countItems = Game::count($s);

// Calcule le nombre de pages à afficher dans la pagination
$nbPages = ceil($countItems / $limit);

// A recuperer depuis paramètre d'url. Si aucune valeur, alors vaut 1
$currentPage = intval(trim(filter_input(INPUT_GET, 'currentPage', FILTER_SANITIZE_NUMBER_INT)));

if($currentPage <= 0 || $currentPage > $nbPages){
    $currentPage = 1;
}

//Définit à partir de quel enregistrement positionner le curseur (l'offset) dans la requête
$offset = $limit*($currentPage-1);

// Appel à la méthode statique permettant de récupérer les patients selon la recherche et la pagination
$allGames = Game::getAll($s,$limit,$offset);
/*************************************************************/

/* ************* AFFICHAGE DES VUES **************************/

include(dirname(__FILE__).'/../views/templates/header.php');
    include(dirname(__FILE__).'/../views/page-menu-test.php');
include(dirname(__FILE__).'/../views/templates/footer.php');
?>