<div class="container "> 
        <div class="row"> 
            <div class="col-6 justify-content-center m-auto">
                <h2 class="m-auto col-6  ">Ajout de studio</h2>
            </div>       
            <form class="col-8 m-auto bg-light"  method="POST" enctype="multipart/form-data">
                    
                    <!-- titre du jeu -->
                    <div class="form-group">
                        <label for="studioGame"><strong>Jeu</strong></label>
                        
                        <select name="studioName" id="studioGame">
                            <?php foreach($listGame as $value): ?>
                                <option  value="<?= $value->id?>"><?= $value->title ?></option>
                            <?php endforeach ?>
                        </select>
                        <div id="studioGame_error" class="form-text formError">
                            <?= $errorsArray['error_game'] ?? ''?>
                        </div>
                    </div>
                    <div class="form-group col-12">
                            <!-- <label class="col-6" for="imgMenu"><strong>Image de menu</strong></label>
                            <input class="col-6" type="file" name='imgMenu' id="imgMenu">
                            <div  class="form-text formError">
                                <?= $errorsArray['format_img'] ?? '' ?>
                            </div>
                            <input type="text" name="altImgMenu"> -->
                            <!-- <label class="col-6"for="imgPrincipal"><strong>Image principale</strong></label>
                            <input class="col-6"type="file" name='imgPrincipal' id="imgPrincipal"> --> -->
                            
                            <!-- <input type="text"name="altImgPrincipal"> -->
                            <label class="col-6"for="imgCarousel"><strong>Image de caroussel</strong></label>
                            <input class="col-6"type="file" name='imgCarousel[]' id="imgcarousel">
                            <div class="form-text formError">
                                <?= $errorsArray['format_img2'] ?? '' ?>
                            </div>
                            <!-- <input type="text"name="altImgCarousel"> -->
                            <label class="col-6"for="imgCarousel"><strong>Image de caroussel 2</strong></label>
                            <input class="col-6"type="file" name='imgCarousel[]' id="imgcarousel2">
                             <div  class="form-text formError">
                                <?= $errorsArray['format_img3'] ?? '' ?>
                            </div> 
                            <!-- <input type="text"name="altImgCarouse2"> -->
                            <label class="col-6"for="imgCarousel"><strong>Image de caroussel 3</strong></label>
                            <input class="col-6"type="file" name='imgCarousel[]' id="imgcarousel3">
                            <div  class="form-text formError">
                                <?= $errorsArray['format_img4'] ?? '' ?>
                            </div>
                            <!-- <input type="text"name="altImgCarouse3"> -->
                            <label class="col-6"for="imgCarousel"><strong>Image de caroussel 4</strong></label>
                            <input class="col-6"type="file" name='imgCarousel[]' id="imgcarousel4">
                            <div  class="form-text formError">
                                <?= $errorsArray['format_img5'] ?? '' ?>
                            </div>
                            <div class="form-text formError">
                                <?= $errorsArray['error_img'] ?? ''?>
                            </div>
                            <!-- <input type="text"name="altImgCarouse4"> -->
                        </div>
                        <button type="submit" class="btn buttonNav">Ajouter</button>
                    </div>
                   
            </form>
        </div>
    </div>