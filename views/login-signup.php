<?php if($success): ?>
    <div class="alert alert-success"><?= $success ?></div>
<?php endif ?>
    <!--début main-->
    <main class="container">
        <div class="row justify-content-center m-auto">
            <!-- début formulaire login -->
            <form class="col-md-5 login mt-3 pb-3 "  method="POST">
                <h3>Connectez-vous</h3>
                <!-- mail de connection -->
                <div class="form-group">
                    <label for="emailLogin">Adresse mail</label>
                    <input type="loginMail" class="form-control" id="emailLogin" aria-describedby="emailHelp" name="loginMail"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="ex : dupontl@gmail.com" value="">
                    <div id="mail_error" class="form-text formError"><?= $errorsArray['loginMail_error'] ?? ''?></div>
                </div>
                <!-- mot de passe de connection -->
                <div class="form-group">
                    <label for="loginPassword">Mot de passe</label>
                    <input type="password" class="form-control" name="loginPassword" id="loginPassword" title='Le mot de passe doit contenir au moins 10 caractères dont 2 majuscules, 1minuscule et 2 chiffres. Les caractères spéciaux ne sont pas autorisés'>
                    <div id="loginPassword_error" class="form-text formError"><?= $errorsArray['login_error'] ?? ''?></div>
                </div>
   <!-- <a href="userpage.php"></a> -->
                <button type="submit" class="btn buttonNav" name="login" >Valider</button>
            </form>
            <!-- fin login -->
            <!-- **************************************************************************** -->
          <!-- **************************************************************************** -->
            <!-- début sign up -->
            <form class="col-md-5 login mt-3 pb-3 ml-md-5 " method="POST">
                <h3>Inscrivez-vous</h3> 
                <!-- Champ nom -->
                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" class="form-control" id="name" name="name" aria-describedby="lastname" pattern="[a-zA-ZàâæçéèêëîïôœùûüÿÀÂÆÇnÉÈÊËÎÏÔŒÙÛÜŸ-_]+" value="<?=$lastname ?? ''?>" required>
                    <div id="name_error" class="form-text formError"><?= $errorsArray['name_error'] ?? ''?></div>
                </div>
                <!-- Prénom -->
                <div class="form-group">
                    <label for="firstName">Prénom</label>
                    <input type="text" class="form-control" id="firstName" name="firstName" aria-describedby="fistname" pattern="[a-zA-ZàâæçéèêëîïôœùûüÿÀÂÆÇnÉÈÊËÎÏÔŒÙÛÜŸ-_]+" value="<?=$firstname ?? ''?>" required>
                    <div id="firstname_error" class="form-text formError"><?= $errorsArray['firstname_error'] ?? ''?></div>
                </div>
                <!-- Pseudo -->
                <div class="form-group">
                    <label for="pseudo">Pseudo</label>
                    <input type="text" class="form-control" id="pseudo" name="pseudo" aria-describedby="pseudo" pattern="^([a-zA-Z0-9-_]{2,20})$" title="Le pseudo peut comporter de 2 à 20 caractères. Seulement lettres, chiffres et '-,_' acceptés  " value="<?=$pseudo ?? ''?>" required>
                    <div id="pseudo_error" class="form-text formError"><?= $errorsArray['pseudo_error'] ?? ''?></div>
                </div>
                <!-- email -->
                <div class="form-group">
                    <label for="mail">Adresse mail</label>
                    <input type="email" class="form-control" id="mail" name="mail" aria-describedby="emailHelp"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="ex : dupontl@gmail.com" value="<?=$mail ?? ''?>" required>
                    <div id="mail_error" class="form-text formError"><?= $errorsArray['mail_error'] ?? ''?></div>
                </div>
                <!-- confirmation email -->
                <div class="form-group">
                    <label for="confirmMail">Confirmez votre adresse mail</label>
                    <input type="email" class="form-control" id="confirmMail" name="confirmMail" aria-describedby="emailHelp"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="ex : dupontl@gmail.com" value="<?=$confirmMail ?? ''?>" required>
                    <div id="confirm_mail_error" class="form-text formError"><?= $errorsArray['confirm_mail_error'] ?? ''?></div>
                </div>
                <!-- mot de passe -->
                <div class="form-group">
                    <label for="passwd">Mot de passe</label>
                    <input type="password" class="form-control" id="passwd" name="passwd" pattern="^[0-9]{2}$" title='Le mot de passe doit contenir au moins 10 caractères dont 2 majuscules, 1minuscule et 2 chiffres. Les caractères spéciaux ne sont pas autorisés' value="<?=$passwd ?? ''?>" required>
                    <div id="password_error" class="form-text formError"><?= $errorsArray['password_error'] ?? ''?></div>
                </div>
                <!-- confirmation mot de passe -->
                <div class="form-group">
                    <label for="confirmPassword">Confirmez votre mot de passe</label>
                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" pattern="^[0-9]{2}$" title='Le mot de passe doit contenir au moins 10 caractères dont 2 majuscules, 1minuscule et 2 chiffres. Les caractères spéciaux ne sont pas autorisés'value="<?=$confirmPassword ?? ''?>" required>
                    <div id="confirm_password_error" class="form-text formError"><?= $errorsArray['confirm_password_error'] ?? ''?></div>
                </div>
                
                <button type="submit" name ="inscription" class="btn buttonNav">Valider</button>
            </form>
        </div>
    </main>
    
    <!--fin main-->
    <!-- début footer -->
    <!-- ^(?=.{10,}$)(?=(?:.*?[A-Z]){2})(?=.*?[a-z])(?=(?:.*?[0-9]){2}).*$ -->