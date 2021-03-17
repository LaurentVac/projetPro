<?php
session_start();
$background = 'bgHomePage';
$errorsArray=[];
require_once(dirname(__FILE__).'/../utils/regexp.php');
require_once(dirname(__FILE__).'/../models/User.php');
require_once(dirname(__FILE__).'/../models/Studio.php');
require_once(dirname(__FILE__).'/../models/Platform.php');
$id = $_SESSION['mail'];
$user = new User ();
$profilUser = $user->profilUser($id);


//************************************************ */
//vérification champ pseudo
if($_SERVER['REQUEST_METHOD'] == 'POST'  ){
    if(isset($_POST['updateLastname'])){
        $lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

        //On test si le champ n'est pas vide
        if(!empty($lastname)){
            // On test la valeur
            $testRegexName = preg_match(REGEXP_STR_NO_NUMBER,$lastname);

            if($testRegexName == false){
                $errorsArray['lastname_error'] = 'Le nom n\'est pas valide';
            }
        }else{
            $errorsArray['lastname_error'] = 'Le champ n\'est pas rempli';
        }
        if(empty($errorsArray)){
            $setLastname = $user->setLastname($lastname);
            $updateLastname = $user->updateLastname($id);
            var_dump($updateLastname);
            if($updateLastname){
                header('location: /controllers/user-pageCtrl.php');
            }
        }
    }
    if(isset($_POST['updateFirstname'])){
        $firstname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

        //On test si le champ n'est pas vide
        if(!empty($firstname)){
            // On test la valeur
            $testRegexName = preg_match(REGEXP_STR_NO_NUMBER,$firstname);

            if($testRegexName == false){
                $errorsArray['firstname_error'] = 'Le nom n\'est pas valide';
            }
        }else{
            $errorsArray['firstname_error'] = 'Le champ n\'est pas rempli';
        }
        if(empty($errorsArray)){
            $setFirstname = $user->setFirstname($firstname);
            $updateFirstname = $user->updateFirstname($id);
            var_dump($updateFirstname);
            if($updateFirstname){
                header('location: /controllers/user-pageCtrl.php');
            }
        }
    }
    if(isset($_POST['updatePseudo'])){
        $pseudo = trim(filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES)); 
        
        //On test si le champ n'est pas vide
        if(!empty($pseudo)){
            // On test la valeur
            $testRegex = preg_match('/^([a-zA-Z0-9-_]{2,36})$/',$pseudo);
            if($testRegex == false){
                $errorsArray['pseudo_error'] = 'Le pseudo n\'est pas valide';
            }
        }else{
            $errorsArray['pseudo_error'] = 'Le champ n\'est pas rempli';
        }

        if(empty($errorsArray)){    
            $setPseudo = $user->setPseudo($pseudo);
           
            if($user->isNotExistPseudo($pseudo)){
                $updatePseudo = $user->updatePseudo($id);
                if($updatePseudo){
                    $_SESSION['pseudo'] = $pseudo;
                    header('location: /controllers/user-pageCtrl.php');
                    $success = 'Modification réussite.';
                }
            }else{
                $errorsArray['pseudo_error'] = 'Le pseudo est déjà utisilisé veuillez en saisir un nouveau';
            }    
            
            
            
            
        }
    }
    if(isset($_POST['updateMail'])){
        $oldMail = trim(filter_input(INPUT_POST, 'oldMail', FILTER_SANITIZE_EMAIL));
        $mail = trim(filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL));
        var_dump($mail) ;
    
        //On test si le champ n'est pas vide
        if(!empty($mail) && !empty($oldMail)){
            
            // On test la valeur
            $testMail1 = filter_var($mail, FILTER_VALIDATE_EMAIL);
            $testMail2 = filter_var($oldMail, FILTER_VALIDATE_EMAIL);
            
            if($testMail1 == false && $testMail2 == false){
                $errorsArray['mail_error'] = 'Un des mails n\'est pas valide';
            }
            if($oldMail != $profilUser->mail){
                $errorsArray['oldMail_error'] = 'Votre ancien mail n\'est pas correct';
            }


        }else{
            $errorsArray['mail_error'] = 'Un champ n\'est pas rempli';
        } 

        if(empty($errorsArray)){
            $setMail = $user->setMail($mail);
            if($user->isNotExistMail($mail)){
                $updateMail = $user->updateMail($id);
                if($updateMail){
                    $_SESSION['mail'] = $mail;
                    header('location: /controllers/user-pageCtrl.php');
                }   
            }else{
                $errorsArray['mail_error'] = 'Le mail existe déjà veuillez en saisir un nouveau';

            }  
            
        }
    }
    //mise à jour du mot de passe 
    if(isset($_POST['updatePassword'])){
        $oldpassword =  filter_input(INPUT_POST, 'oldPassword', FILTER_SANITIZE_STRING);
        $newPassword =  filter_input(INPUT_POST, 'newPassword', FILTER_SANITIZE_STRING);
        $validNewPassword =  filter_input(INPUT_POST, 'validNewPassword', FILTER_SANITIZE_STRING);
        if(password_verify($oldpassword, $profilUser->passwd)){
            if(!empty($oldPassword)){ 
                
                $testRegexPassword = preg_match( '/^[0-9]{2}$/',$newPassword);
                var_dump($testRegexPassword);
                if($testRegexPassword == false){
        
                    $errorsArray['password_error'] = 'Le mot de passe doit contenir au minimum 10 caractères dont au moins 2 majuscules, 1minuscule et 2 chiffres. Les caractères spéciaux ne sont pas autorisés';
        
                }
            }
        }else{
            $errorsArray['password_error'] = 'Le mot de passe actuel saisi est incorrect';
        }
    
        if($validNewPassword == $newPassword){
            if(empty($errorsArray)){ 
                $hashPasswd = $user->setPassword($newPassword);
                var_dump($hashPasswd);
                $updatePasswd = $user->updatePassword($id);
                var_dump($updatePasswd);
            }
        }else{
            $errorsArray['password_error'] = 'Les mots de passe sont différents, veuiller saisir des mot de passe identique ';
        }
        var_dump($errorsArray);
    } 


}

var_dump($errorsArray);
   
    





include(dirname(__FILE__).'/../views/templates/header.php');

include(dirname(__FILE__).'/../views/user-page.php');

include(dirname(__FILE__).'/../views/templates/footer.php');  

?>