

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/controllers/adminCtrl.php">Accueil admin</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="/controllers/admin-add-gameCtrl.php">Ajout de test<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/controllers/management-userCtrl.php">Gestion d'utilasateurs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/controllers/admin-add-studioCtrl.php">Ajout de studio</a>
            </li>
             <li class="nav-item">
                <a class="nav-link " href="/controllers/admin-add-platformCtrl.php" >Ajout de plateforme</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>

        </ul>
    </div>
</nav>
<div class="container "> 
        <div class="row"> 
            <div class="col-6 justify-content-center m-auto">
                <h2 class="m-auto col-6  ">Ajout de studio</h2>
            </div>       
            <form class="col-8 m-auto bg-light"  method="POST">
                    
                    <!-- titre du jeu -->
                    <div class="form-group">
                        <label for="studio"><strong>Studio</strong></label>
                        <input type="text" class="form-control" id="studio" name="studio"
                            aria-describedby="title" value="<?=$studioName ?? ''?>">
                        <div id="studio_error" class="form-text formError">
                            <?= $errorsArray['studio_error'] ?? ''?>
                        </div>
                    </div>
                    <button type="submit" class="btn buttonNav">Ajouter</button>
            </form>
        </div>
    </div>
    