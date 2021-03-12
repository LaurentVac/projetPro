
    <!--fin header-->
    <!--début main-->
    <main class=" container ">
        <div class="row justify-content-center m-auto">
            <!-- début formulaire login -->
            <div class=" col-12 col-md-5 account mt-4 p-0 pb-2">
                <div class="col-12 row justify-content-center">
                    <h2>Mon compte</h2>
                </div>
                <div class="row col-12 ml-md-1 mt-2 ">
                    <p class="">
                        <strong class="col-12 mintitle">Mon prénom :</strong>
                        <div class="col-12"><?=$profilUser->firstname?></div>
                        <a class="btn btn-primary ml-3 mt-2  p-1" data-toggle="collapse" href="#collapsefirstname"
                            role="button" aria-expanded="false" aria-controls="collapsefirstname">Modifier
                        </a>
                    </p>
                    <div class="row ">
                        <div class=" ml-md-5">
                            <div class="collapse  " id="collapsefirstname">
                            <form method="POST">
                                <input type="text" class=" col-6 ml-md-2 ml-5 mt-2 " name="firstname" value= "<?=$firstname ?? ''?>">
                                <div id="firstname_error" class="form-text formError"><?= $errorsArray['firstname_error'] ?? ''?></div>
                                <button type="submit" name="updateFirstname" class="btn buttonNav">OK</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row col-12 ml-md-1 mt-2 ">
                    <p class="">
                        <strong class="col-12 mintitle">Mon nom :</strong>
                        <div class="col-12"><?=$profilUser->lastname?></div>
                        <a class="btn btn-primary ml-3 mt-2  p-1" data-toggle="collapse" href="#collapseLastname"
                            role="button" aria-expanded="false" aria-controls="collapseLastname">Modifier
                        </a>
                    </p>
                    <div class="row ">
                        <div class=" ml-md-5">
                            <div class="collapse  " id="collapseLastname">
                            <form method="POST">
                                <input type="text" class=" col-6 ml-md-2 ml-5 mt-2 " name="lastname" value= "<?=$lastname ?? ''?>">
                                <div id="lastname_error" class="form-text formError"><?= $errorsArray['lastname_error'] ?? ''?></div>
                                <button type="submit" name="updateLastname" class="btn buttonNav">OK</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row col-12 ml-md-1 mt-2 ">
                    <p class="">
                        <strong class="col-12 mintitle">Mon pseudo :</strong>
                        <div class="col-12"><?=$profilUser->pseudo?></div>
                        <a class="btn btn-primary ml-3 mt-2  p-1" data-toggle="collapse" href="#collapsePseudo"
                            role="button" aria-expanded="false" aria-controls="collapsePseudo">Modifier
                        </a>
                    </p>
                    <div class="row ">
                        <div class=" ml-md-5">
                            <div class="collapse  " id="collapsePseudo">
                            <form method="POST">
                                <input type="text" class=" col-6 ml-md-2 ml-5 mt-2 " name="pseudo" value= "<?=$pseudo ?? ''?>">
                                <div id="pseudo_error" class="form-text formError"><?= $errorsArray['pseudo_error'] ?? ''?></div>
                                <button type="submit" name="updatePseudo" class="btn buttonNav">OK</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row col-12 ml-md-1 mt-2">
                    <p>
                        <strong class="col-12 mintitle"> Mon mail :</strong>
                        <div class="col-12"><?= $profilUser->mail?></div>
                        <a class="btn btn-primary ml-3 mt-2 p-1" data-toggle="collapse" href="#collapseMail"
                            role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Modifier</a>
                    </p>
                    <div class="row">
                        <div class="ml-md-5">
                            <div class="collapse  " id="collapseMail">
                            <form method="POST">
                                <input type="email" class="col-6 ml-md-2 ml-5 mt-2" name="mail">
                                <div id="pseudo_error" class="form-text formError"><?= $errorsArray['mail_error'] ?? ''?></div>
                                <button type="submit" name="updateMail" class="btn buttonNav">OK</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row col-12 ml-md-1 mt-2 ">
                    <p>
                        <strong class="col-12 mintitle"> Mon mot de passe :</strong>
                        
                        <div class="col-12"><a class="btn btn-primary ml-3 mt-2 p-1" data-toggle="collapse" href="#collapsePassword"
                            role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Modifier</a></div>
                    </p>
                    <div class="row">
                        <div class="ml-md-5">
                            <div class="collapse " id="collapsePassword">
                            <form method="POST">
                            <label class="col-12" for="pass">Votre mot de passe actuel</label>
                                <input type="password" name="oldPassword"class=" col-6 ml-md-2 ml-5 mt-2">
                                
                                <label class="col-12" for="pass">Votre nouveau mot de passe</label>
                                <input type="password" name="newPassword"class=" col-6 ml-md-2 ml-5 mt-2">
                                <label class="col-12" for="pass">Votre nouveau mot de passe</label>
                                <input type="password" name="validNewPassword"class=" col-6 ml-md-2 ml-5 mt-2">
                                <div id="pseudo_error" class="form-text formError"><?= $errorsArray['password_error'] ?? ''?></div>
                                <button type="submit" name="updatePassword" class="btn buttonNav">OK</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row col-12  ml-md-1 mt-4">
                    <button type="button" class="btn btn-danger ml-3" data-toggle="modal" data-target="#exampleModal">
                        Supprimer mon compte
                    </button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body text-dark">
                                    Attention ! Voulez-vous supprimer votre compte ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Revenir à la
                                        page précédente</button>
                                    <button type="button" class="btn btn-danger">Supprimer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!--fin main-->
    <!-- début footer -->

        