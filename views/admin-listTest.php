
    <main class="container">
        <div class="row">
            <div class="col-6 justify-content-center m-auto">
                <h2 class="m-auto col-6  ">Gestion des test</h2>
            </div>    
            <div class="col-8 m-auto">
                <div class="tab-pane fade show active" id="userManagement" role="tabpanel"
                    aria-labelledby="list-profile-list">
                    <table class="table table-striped table-dark">
                        <thead>
                            <tr>
                                <th scope="col">Titre</th>
                                <th scope="col">Afficher</th>
                                <th scope="col">Modifier</th>
                                <th scope="col">Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($listGame as $value):?>
                            <tr>
                                <td><?= $value->title?></td>
                                <td><a href="/controllers/testCtrl.php?id=<?=$value->id?>">Afficher</a></td>
                                <td><a href="/controllers/admin-update-testCtrl.php?id=<?=$value->id?>">Modifier</a></td>
                                <td><a href="/controllers/admin-confirm-deleteCtrl.php?idGame=<?=$value->id?>">Supprimer</a></td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <div class="emptyFooter"></div>