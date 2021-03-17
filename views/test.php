<main class="container ">
    <div class="row">
        <!-- image principale -->
        <img src="/assets/img/main/<?=$idGame?>.png" class="col-12 p-0" alt="mario kart tour">
        <div class="row col-12 justify-content-center m-auto">
            <!-- video youtube (trailer) -->
            <iframe width="560" height="315" class="col-md-6 mt-3" src="<?=$displayTest->iframeYoutube ?>"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
                <!-- images dans carousel -->
            <div id="carouselExampleFade" class="carousel slide carousel-fade col-md-5  m-auto" data-ride="carousel">
                <div class="carousel-inner mt-3 mt-md-0">
                    <!-- <div class="carousel-item active">
                        <img src="/assets/img/main/<?=$idGame?>.png" class="d-block w-100" alt="mkt2">
                    </div>  -->
                    <?php $i=1;
                    foreach($displayPicture as $picture){ 
                        if($i == 1){ ?>
                            <div class="carousel-item active">
                <?php   }else{?>
                            <div class="carousel-item ">
                            <?php }?>
                        
                            <img src="/assets/img/carousel/<?=$picture->id?>.png" class="d-block w-100" alt="mkt2">
                        </div>
                        <?php $i++;
                    } ?>
                    
                </div>
                <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class=" col-12 col-md-6 justify-content-center m-auto  ">
            <div class="description p-2 mt-4 ">
                <!-- info du jeu -->
                <h5 class="text-center">Informations</h5>
                <p><strong class="text-danger">Titre :</strong> <?= $displayTest->title ?> </p>
                <p><strong class="text-danger">Studio :</strong> <?= $displayStudio->studioName ?> </p>
                <p><strong class="text-danger">Date de sortie :</strong> <?= $displayTest->releaseDate ?></p>
                <p><strong class="text-danger">Plateforme disponible :</strong> <?php foreach($displayPlatform as $platform): echo $platform->platform ;endforeach; ?></p>

            </div>
        </div>
        <div class=" col-12 col-md-6 justify-content-center m-auto  ">
            <div class="description p-2 mt-4 "> 
                <!-- info du jeu -->
                <h5 class="text-center">Synopsis</h5>
                <p><?= $displayTest->synopsis ?></p>
             

            </div>
        </div>
        <!-- test -->
        <div class=" col-12 justify-content-center m-auto  ">
            <div class="description p-2 mt-4 ">
                <h5>Test effectué sur PS4</h5>
                <p><?= $displayTest->test ?></p>
            </div>
        </div>
        <!-- note -->
        <div class="m-auto">
            <div class="rating bg-dark p-2 mt-3">
                <strong style="font-size:50px"><?= $displayTest->note ?>/20</strong>
            </div>
        </div>
        <!-- atouts et defaults -->
        <div class="row col-12 justify-content-center m-auto">
            <div class="col-md-5  mt-3 p-2 positiveReview">
                <h5>Les + :</h5>
                <ul>
                    <li><?= $displayTest->asset1 ?></li>
                    <li><?= $displayTest->asset2 ?></li>
                    <li><?= $displayTest->asset3 ?></li>
                    <li><?= $displayTest->asset4 ?></li>
                </ul>
            </div>
            <div class="col-md-5 ml-md-3 mt-3 p-2 negativeReview">
                <h5>Les - :</h5>
                <ul>
                    <li><?= $displayTest->default1 ?></li>
                    <li><?= $displayTest->default2 ?></li>
                    <li><?= $displayTest->default3 ?></li>
                    <li><?= $displayTest->default4 ?></li>
                </ul>
            </div>
        </div>
        <div class="comment col-12 justify-content-center mt-3">
            <h5>Commentaires</h5>
            <?php foreach($displayComment as $comment): ?>
            <div class="commentbox px-2 ">
                <fieldset><?=$comment->pseudo?></fieldset>
                <p><?=$comment->comment?>
                </p>

            </div>
            <?php endforeach?>
            <?php if(isset($_SESSION['mail'])): ?>
            <form method="POST">
                <label class="col-12" for="comment">Laisser votre commentaire</label>
                <input class="col-12 h-20" type="text" id="comment" name="comment">
                <button type="submit">Envoyer</button>
            </form>
            <?php endif ?>

        </div>
    </div>
</main>