<main class="container ">
        <div class="row  ">
            <div class=" col-12 titleHome mt-4 ">
                <h4>Les tests</h4>
            </div>
            <div class="row col-12 justify-content-center m-auto ">
                <?php foreach($lastGame as $picture): ?>
                <div class="card bg-dark col-12  col-md-5 p-0 mt-3 mr-md-2">
                    <a href="/controllers/testCtrl.php?id=<?=$picture->id?>"> <img src="/assets/img/menu/<?= $picture->id ?>.png" class="card-img float-left"
                            alt="<?= $picture->title ?>">
                    </a>
                </div>
                <?php endforeach ?>
                
            </div>
            <div class="col-12 titleHome mt-4 ">
                <h4>Les tops</h4>
            </div>
            <div class="col-12 row justify-content-center m-auto ">
                <div class="card bg-dark text-white col-12 col-md-5 p-0 mt-3 mr-md-2 ">
                    <img src="/assets/img/podium.png" class="card-img " alt="img-podium">
                    <div class="card-img-overlay">
                        <h5 class="card-title">Meilleur gameplay de génération PS4</h5>
                    </div>
                </div>
                <div class="card bg-dark text-white col-12 col-md-5 p-0 mt-3 ml-md-1">
                    <img src="/assets/img/podium.png" class="card-img" alt="img-podium">
                    <div class="card-img-overlay ">
                        <h5 class="card-title">Meilleur scénario sur PS4 en 2020</h5>
                    </div>
                </div>
            </div>
        </div>
</main>