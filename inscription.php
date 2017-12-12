<?php
include('inc/pdo.php');
include('inc/fonctions.php');

$errors = array();
$success = false;

if(!empty($_POST['submitinscription'])) {
    // protection XSS
$pseudo = trim(strip_tags($_POST['pseudo']));
$email  = trim(strip_tags($_POST['email']));
$pass  = trim(strip_tags($_POST['pass']));
$passConfirm  = trim(strip_tags($_POST['passConfirm']));

echo $pseudo;
echo $email;
if (!empty($_POST['pseudo'])) {

$errors = testLongueurChamps($errors, 'pseudo', $pseudo, 5, 100);

  $sql = "SELECT pseudo FROM users WHERE pseudo = :pseudo";
    $query = $pdo->prepare($sql);
    $query->bindValue(':pseudo',$pseudo);
    $query->execute();
    $pseudoVerif = $query->fetch();
  if(!empty($pseudoVerif)) {
    $errors['pseudo'] = 'Ce pseudo existe déjà.';
    }

}
    // Error => email
if (!empty($_POST['email'])) {

$errors = validerMail($errors, $email, 'email' );


    $sql = "SELECT email FROM users WHERE email = :email";
      $query = $pdo->prepare($sql);
      $query->bindValue(':email',$email);
      $query->execute();
      $emailVerif = $query->fetch();

  if(!empty($emailVerif)) {
    $errors['email'] = 'Cette adresse e-mail existe déjà.';
    }

}
//==============================================================================
    // Error  password
// validation de formulaire à partir de $password
if(!empty($pass) && !empty($passConfirm)) {
  if ($pass !== $passConfirm) {
    $errors['passConfirm'] = 'Les mots de passe ne correspondent pas';
    $errors['pass'] = 'Les mots de passe ne correspondent pas';
  if(strlen($pass) < 6) {
    $errors['pass'] = 'Insuffisant minimum 6 caracteres.';
  } elseif(strlen($pass) > 150) {
    $errors['pass'] = 'Nombre de caracteres trop grand.';
  }
  }
}
else {
  $errors['pass'] = 'Veuillez renseigner votre password';
}

//==============================================================================
        // Si pas d'erreur => creation du compte
        if(count($errors) == 0) {
            // hash password
            $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);

            // creation du token
            $token = generateRandomString(50);
                // autre method creation token

            // creation compte => insert dans BDD
            $sql = "INSERT INTO users (pseudo, email, pass, created_at, role, token) VALUES(:pseudo, :email, :pass, NOW(),'user', :token)";
            $query = $pdo->prepare($sql);
                $query->bindValue(':pseudo',$pseudo, PDO::PARAM_STR);
                $query->bindValue(':email',$email, PDO::PARAM_STR);
                $query->bindValue(':pass',$hashedPassword, PDO::PARAM_STR);
                $query->bindValue(':token',$token, PDO::PARAM_STR);
                // $smtp->bindValue(':token',$token, PDO::PARAM_STR);
                $query->execute();

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
                <input type="text" name="email" id="email" class="form-control" value="<?php if(!empty($_POST['email'])) { echo $_POST['email']; } ?>" />
            </div>

            <input type="submit" name="submitinscription" value="Je m'inscris" class="btn btn-default" />

        </form>
<?php } ?>








<?php
include('inc/footer.php');
