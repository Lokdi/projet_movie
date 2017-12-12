<?php include('inc/conf.php'); ?>
<?php
// session_start();
$errors = array();
// debug($_SESSION);
// debug($_SESSION['user']['role']);
if (!empty($_GET['id']) && is_numeric($_GET['id'])) {
  $id = $_GET['id'];
  // echo $id;
        $sql = "SELECT * FROM users WHERE id = :id";
        $query = $pdo->prepare($sql);
        $query ->bindValue (':id', $id, PDO::PARAM_INT);
        $query->execute();
        $users = $query->fetch();
        // debug($idMovie);
          if(empty($users)) {
              header('Location: dashboard.php');
          }else {
            if(!empty($_POST['submitinscription'])) {
                // protection XSS
            $pseudo = trim(strip_tags($_POST['pseudo']));
            $email  = trim(strip_tags($_POST['email']));
            $role  = trim(strip_tags($_POST['role']));
            //
            // echo $pseudo;
            // echo $email;
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
                            // Si pas d'erreur => Modification du compte
            }

            if(count($errors) == 0) {
                // creation compte => insert dans BDD
                $sql = "UPDATE users SET pseudo = :pseudo AND email = :email AND role = :role WHERE id = :id";
                $query = $pdo->prepare($sql);
                    $query->bindValue(':pseudo',$pseudo, PDO::PARAM_STR);
                    $query->bindValue(':email',$email, PDO::PARAM_STR);
                    $query->bindValue(':id',$id, PDO::PARAM_INT);
                    $query->bindValue(':role',$role, PDO::PARAM_INT);
                    // role ????
                    $query->execute();

                $success = true;
                Header("Location: statsUser.php");
                // faire une connection +++
}

}




















          }
}

?>
<?php include('inc/headerBO.php'); ?>

<form method="POST" action="" id="forminscription">

    <div class="form-group">
        <label for="pseudo">Pseudo*</label>
        <span class="error"><?php if(!empty($errors['pseudo'])) { echo $errors['pseudo']; } ?></span>
        <input type="text" name="pseudo" id="pseudo" class="form-control" value="<?php if(!empty($_POST['pseudo'])) {echo $_POST['pseudo']; } else { if(!empty($users['pseudo'])) {echo $users['pseudo']; }} ?>" />
        <span><?php erreursForm($errors,'pseudo')?></span>
    </div>

    <div class="form-group">
        <label for="email">Email*</label>
        <span class="error"><?php if(!empty($errors['email'])) { echo $errors['email']; } ?></span>
        <input type="text" name="email" id="email" class="form-control" value="<?php if(!empty($_POST['email'])) {echo $_POST['email']; } else { if(!empty($users['email'])) {echo $users['email']; }} ?>" />
    </div>

    <div class="form-group">
        <select class="" name="role">
          <label for="role">Role*</label>
					<option value="<?php echo $users['role']; ?>"<?php if(!empty($_POST['role'])) { if($_POST['role'] == $users['role']) { echo ' selected="selected"'; } } ?>><?php echo $users['role']; ?></option>
					<option value="">User</option>
        </select>
    </div>

    <input type="submit" name="submitinscription" value="Modifier client" class="btn btn-default" />

</form>



<?php include('inc/footerBO.php'); ?>
