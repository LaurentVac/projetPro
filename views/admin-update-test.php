
    <div class="container "> 
        <div class="row"> 
            <div class="col-6  justify-content-center m-auto">
                <h2 class="m-auto col-8  ">Mise à jour de test</h2>
            </div>       
            <form class="col-8 m-auto bg-light "  method="POST" enctype="multipart/form-data">
                    
                    <!-- titre du jeu -->
                    <div class="form-group">
                        <label for="title"><strong>Titre du jeu</strong></label>
                        <input type="text" class="form-control" id="title" name="title"
                            aria-describedby="title" value="<?=$displayGame->title?>">
                        <div id="titleGame_error" class="form-text formError">
                            <?= $errorsArray['error_title'] ?? ''?>
                        </div>
                    </div>
                    <!-- studio de developpement -->
                    <div class="form-group">
                        <label for="studioGame"><strong>Studio</strong></label>
                        
                        <select name="studioName" id="studioGame">
                            <?php foreach($listStudio as $value): ?>
                                <option  value="<?= $value->id?>"><?= $value->studioName ?></option>
                            <?php endforeach ?>
                        </select>
                        <div id="studioGame_error" class="form-text formError">
                            <?= $errorsArray['error_id_studio'] ?? ''?>
                        </div>
                    </div>
                    <!-- date de sortie -->
                    <div class="form-group">
                        <label for="releaseDate"><strong>Date de sortie</strong> </label>
                        <input type="date" class="form-control" id="releaseDate" name="releaseDate"
                            aria-describedby="releaseDate" value="<?= $displayGame->releaseDate  ?>">
                        <div class="form-text formError">
                            <?= $errorsArray['error_releaseDate'] ?? ''?>
                        </div>
                    </div>
                    <!-- plateforme -->
                    <div class="form-group">
                        <div class="form-check form-check-inline ">
                            <label ><strong>Plateforme</strong></label>
                           
                            <?php foreach($listPlatform as $value): ?>
                                <input class="form-check-input ml-1" type="checkbox"  name="platform" value="<?= $value->id ?>">
                                <label class="form-check-label" ><?= $value->platform ?></label>
                            <?php endforeach ?>
                            <div class="form-text formError">
                                <?= $errorsArray['error_idPlatform'] ?? ''?>
                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="test"><strong>Synopsis</strong></label>
                        <textarea class="form-control"  id="test" name="synopsis" >
                            <?=$displayGame->synopsis?>
                        </textarea>
                        <div class="form-text formError">
                                <?= $errorsArray['error_synopsis'] ?? ''?>
                            </div>

                    </div>
                    <div class="form-group">
                        <label for="test"><strong>Test</strong></label>
                        <textarea class="form-control"  id="test" name="test" >
                            <?= $displayGame->test?>
                        </textarea>
                        <div class="form-text formError">
                            <?= $errorsArray['error_test'] ?? ''?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="note"><strong>Note</strong></label>
                        <input type="number" min="0" max="20" class="form-control"  id="note" name="note" value="<?= $displayGame->note?> ">
                        <div class="form-text formError">
                            <?= $errorsArray['error_note'] ?? ''?>
                        </div>                 
                    </div>
                    <div class="form-group">
                        <label for="iframeYoutube"><strong>Lien Youtube</strong></label>
                        <input type="text"  class="form-control"  id="iframeYoutube" name="iframeYoutube" value="<?= $displayGame->iframeYoutube?> ">
                        <div class="form-text formError">
                                <?= $errorsArray['error_iframeYoutube'] ?? ''?>
                        </div>                    
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="asset1"><strong>Les + </strong></label>
                            <input type="text" class="form-control" id="asset1" name="asset1"
                                aria-describedby="asset1" placeholder="Atout 1" value="<?=$displayGame->asset1 ?>">
                            <input type="text" class="form-control mt-1" id="asset2" name="asset2"
                                aria-describedby="asset2" placeholder="Atout 2" value="<?=$displayGame->asset2?>">
                            <input type="text" class="form-control mt-1" id="asset3" name="asset3"
                                aria-describedby="asset3" placeholder="Atout 3" value="<?=$displayGame->asset3 ?>">
                            <input type="text" class="form-control mt-1" id="asset4" name="asset4"
                                aria-describedby="asset4" placeholder="Atout 4" value="<?=$displayGame->asset4 ?>">
                                <div class="form-text formError">
                                    <?= $errorsArray['error_asset'] ?? ''?>
                                </div>
                        </div>
                        <div class="form-group col-6">
                            <label for="default1"><strong>Les - </strong></label>
                            <input type="text" class="form-control" id="default1" name="default1"
                                aria-describedby="default1" placeholder="Default 1" value="<?=$displayGame->default1?>">
                            <input type="text" class="form-control mt-1" id="default2" name="default2"
                                aria-describedby="default2" placeholder="Default 2" value="<?=$displayGame->default2?>">
                            <input type="text" class="form-control mt-1" id="default3" name="default3"
                                aria-describedby="default3" placeholder="Default 3" value="<?=$displayGame->default3?>">
                            <input type="text" class="form-control mt-1" id="default4" name="default4"
                                aria-describedby="default4" placeholder="Default 4" value="<?=$displayGame->default4?>">
                            <div class="form-text formError">
                                <?= $errorsArray['error_default'] ?? ''?>
                            </div>
                        </div>

                    </div>
                    <button type="submit" class="btn buttonNav">Ajouter</button>
            </form>
        </div>
    </div> 