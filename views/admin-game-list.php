
<main class="container">
        <div class="row">
            <div class="col-6 justify-content-center m-auto">
                <h2 class="m-auto col-6  ">Gestion des utilisateurs</h2>
            </div>    
            <div class="col-8 m-auto">
                <div class="tab-pane fade show active" id="userManagement" role="tabpanel"
                    aria-labelledby="list-profile-list">
                    <table class="table table-striped table-dark">
                        <thead>
                            <tr>
                                <th scope="col">Titre</th>
                                <th scope="col">Afficher</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($listGame as $value):?>
                            <tr>
                                <td><?= $value->lastname.' '.$value->firstname?></td>                           
                                <td><button type="submit">Afficher</button></td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <div class="emptyFooter"></div>