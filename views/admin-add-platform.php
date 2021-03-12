    
<main class="container">
        <div class="row">
            <div class="col-6 justify-content-center m-auto">
                <h2 class="m-auto col-6  ">Ajout de plateforme</h2>
            </div>             
                    <form class ="col-8 m-auto mt-5" action="" method="POST">
                    <label for="game"><strong>Choix du jeu</strong></label>

                    <select class ="col-8 m-auto mt-5"  name="game" id="game">
                    <?php foreach($listGame as $game):?>
                        <option value="<?=$game->id?>"><?=$game->title?></option>
                        <?php endforeach ?>
                    </select>
                        <div class="form-group">
                            <div class="form-check form-check-inline ">
                                <label ><strong>Plateforme</strong></label>
                                <?php foreach($listPlatform as $value): ?>
                                    <input class="form-check-input ml-1" type="checkbox"  name="platform[]" value="<?= $value->id ?>">
                                    <label class="form-check-label" ><?= $value->platform ?></label>
                                <?php endforeach ?>
                                <div class="form-text formError">
                                    <?= $errorsArray['error_idPlatform'] ?? ''?>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn buttonNav">Ajouter</button>
                    </form> 
                </div>
            </main>