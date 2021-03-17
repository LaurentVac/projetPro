<main class="container">
        <div class="row">
            <div class="col-6 justify-content-center m-auto">
                <h2 class="m-auto col-6  ">Voulez-vous vraiment supprimer cet utilisateur</h2>
            </div>    
            <div class="col-8 m-auto">
                <div class="tab-pane fade show active" id="userManagement" role="tabpanel"
                    aria-labelledby="list-profile-list">
                    <table class="table table-striped table-dark">
                        <thead>
                            <tr>
                                <th scope="col">Prénom</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Pseudo</th>
                                <th scope="col">Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                       
                            <tr>
                                <td><?= $getUser->firstname?></td>
                                <td><?= $getUser->lastname?></td>
                                <td><?= $getUser->pseudo?></td>
                                <td><a href="/controllers/admin-deleteCtrl.php?idUser=<?=$getUser->id?>"><div class="p-2 text-danger">OUI</div>  </a>
                                    <a href="/controllers/management-userCtrl.php"><div class="p-1 col-2 bg-info text-danger ">NON</div></a>
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>