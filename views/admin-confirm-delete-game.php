<main class="container">
        <div class="row">
            <div class="col-6 justify-content-center m-auto">
                <h2 class="m-auto col-6  ">Voulez-vous vraiment supprimer le jeu ?</h2>
            </div>    
            <div class="col-8 m-auto">
                <div class="tab-pane fade show active" id="userManagement" role="tabpanel"
                    aria-labelledby="list-profile-list">
                    <table class="table table-striped table-dark">
                        <thead>
                            <tr>
                                <th scope="col">Titre</th>
                                <th scope="col">Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                       
                            <tr>
                                <td><?= $listGame->title?></td>
                                
                                <td><a href="/controllers/admin-deleteCtrl.php?idGame=<?=$listGame->id?>"><div class="p-2 text-danger">OUI</div>  </a><a href="/controllers/admin-listTestCtrl.php"><div class="p-1 col-2 bg-info text-danger ">NON</div></a></td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>