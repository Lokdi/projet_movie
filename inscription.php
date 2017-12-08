<?php
include('inc/pdo.php');
include('inc/fonction.php');
$errors = array();
$success = false;

if(!empty($_POST['submitinscription'])) {
    // protection XSS
    $pseudo = trim(strip_tags($_POST['pseudo']));
    $email  = trim(strip_tags($_POST['email']));
    $password1  = trim(strip_tags($_POST['pass']));

    // GESTION DES ERRORS
    // Error Pseudo
        if(empty($pseudo)) {
          $errors['pseudo'] = 'Veuillez indiquer un pseudo.';
        }
      elseif(strlen($pseudo) > 100) {
        $errors['pseudo'] = 'Votre pseudo est trop long.';
      }
      elseif(strlen($pseudo) < 2) {
        $errors['pseudo'] = 'Votre pseudo est trop court.';
      }
        elseif(preg_match('/\d/', $pseudo)) {
          $errors['pseudo'] = 'Votre nom ne doit pas contenir de chiffre.';
        }
        // verifier que pseudo est unique
        else {
            $sqlpseudo = "SELECT pseudo FROM users WHERE pseudo = :pseudo";
                $smtp = $dbh->prepare($sqlpseudo);
                $smtp->bindValue(':pseudo',$pseudo);
                $smtp->execute();
                $pseudoexist = $smtp->fetch();
            if(!empty($pseudoexist)) {
                $errors['pseudo'] = 'Ce pseudo existe déjà.';
            }

        }
    // Error => email
        if(empty($email) || (filter_var($email, FILTER_VALIDATE_EMAIL)) === false) {
          $errors['email'] = 'Adresse email invalide.';
        }
        elseif(strlen($email) > 50) {
          $errors['email'] = 'Votre adresse e-mail est trop longue.';
        }
        // verifier que email est unique dans la table users
        else{
            $sqlmail = "SELECT email FROM users WHERE email = :email";
                $smtp = $dbh->prepare($sqlmail);
                $smtp->bindValue(':email',$email);
                $smtp->execute();
                $resultmail = $smtp->fetch();

                if($resultmail) {
                   $errors['email'] = 'Cette adresse e-mail existe déjà.';
                }
        }
    // Error  password
         if($password1 != $password2) {
          $errors['pass'] = 'Les mots de passes ne sont pas identiques.';
        }
        elseif(strlen($password1) <= 5) {
          $errors['pass'] = 'Votre mot de passe doit faire plus de 5 caractères.';
        }

        // Si pas d'erreur => creation du compte
        if(count($errors) == 0) {
            // hash password
            $hashedPassword = password_hash($password1, PASSWORD_DEFAULT);

            // creation du token
            $token = generateRandomString(50);
                // autre method creation token

            // creation compte => insert dans BDD
            $inscription = "INSERT INTO users VALUES('',:pseudo,:email,:pass,:token,NOW(),'user')";
            $smtp = $dbh->prepare($inscription);
                $smtp->bindValue(':pseudo',$pseudo, PDO::PARAM_STR);
                $smtp->bindValue(':email',$email, PDO::PARAM_STR);
                $smtp->bindValue(':pass',$hashedPassword, PDO::PARAM_STR);
                $smtp->bindValue(':token',$token, PDO::PARAM_STR);
            $smtp->execute();

            $success = true;

            // faire une connection +++
        }



}




include('inc/header.php'); ?>

            <h1>Inscription</h1>

<?php if($success) {
    echo 'bravo!';
} else { ?>

        <form method="POST" action="inscription.php" id="forminscription">

            <div class="form-group">
                <label for="pseudo">Pseudo*</label>
                <span class="error"><?php if(!empty($errors['pseudo'])) { echo $errors['pseudo']; } ?></span>
                <input type="text" name="pseudo" id="pseudo" class="form-control" value="<?php if(!empty($_POST['pseudo'])) { echo $_POST['pseudo']; } ?>" />
            </div>

            <div class="form-group">
                <label for="email">Email*</label>
                <span class="error"><?php if(!empty($errors['email'])) { echo $errors['email']; } ?></span>
                <input type="email" name="email" id="email" class="form-control" value="<?php if(!empty($_POST['email'])) { echo $_POST['email']; } ?>" />
            </div>

            <div class="form-group">
                <label for="password1">Password*</label>
                <span class="error"><?php if(!empty($errors['password'])) { echo $errors['password']; } ?></span>
                <input type="text" name="password1" id="password1" class="form-control" value="<?php if(!empty($_POST['password1'])) { echo $_POST['password1']; } ?>" />
            </div>

            <input type="submit" name="submitinscription" value="Je m'inscris" class="btn btn-default" />

        </form>
<?php } ?>








<?php
include('inc/footer.php');
