<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/style.css">
    <!-- <link rel="stylesheet" href="assets/css/animationGODtest.css">
    <link rel="stylesheet" href="assets/css/animationTlou2test.css"> -->
    <title>Accueil MYJVTEST</title>
</head>
<body id ="<?= $background ?>">
    <!--header + navbar-->
    <header id="header" class="container-fluid bg-dark">
        <div class="row ">
            <nav class="navbar navbar-expand-lg col-12 ">
                <a class="navbar-brand" href="#"><h1>Myjvtest</h1></a>
                <!-- Navbar content -->
                <button class="navbar-toggler float-right   " type="button" data-toggle="collapse"
                    data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">       
                    <span class="font-weight-bold  bg-dark text-light ">Menu</span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">  
                        <a class="nav-link active navheader ml-4" href="/index.php">Accueil</a>
                        <a class="nav-link navheader ml-4 " href="/controllers/page-menu-testCtrl.php">Test</a>
                        <!-- <a class="nav-link navheader ml-4" href="menutop.php">Top 3</a> -->
                        <a class="nav-link navheader ml-4" href="mailto:laurentvac80@gmail.com">Contact</a>
                        
                       
                    </div>
                    <?php
                        if(!empty($_SESSION['pseudo'])){
                            echo '
                                <div class="text-light navbar-brand ml-auto">'.$_SESSION['pseudo'].'</div>
                                <a href="/controllers/user-pageCtrl.php" class="important"><div>Mon compte</div></a>
                                <a class="ml-1" href="/controllers/signoutCtrl.php" class="important"><div>Déconnexion</div></a>
                                ';
                        } 
                    ?>
                </div>                
                <?php if(empty($_SESSION)){?>
                <a href="/controllers/login-signupCtrl.php">Inscription/Connexion</button></a>
                <?php } ?>
            </nav>  
            <?php 
            if(isset($_SESSION['admin'])){
                include(dirname(__FILE__).'/admin-navbar.php');
            }
            ?>
        </div>
    </header>
