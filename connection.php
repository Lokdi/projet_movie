<?php
// include('conf.php');
include('inc/pdo.php');
include('inc/fonctions.php');
// session_start();

$errors = array();

if (!empty($_POST['submit'])) {

  $login = $_POST['login'];
  $pass = $_POST['pass'];

  $errors = testLongueurChamps($errors, 'login', $login, 5, 100);
  $errors = testLongueurChamps($errors, 'pass', $pass, 5, 150);


if (count($errors) == 0) {
  $sql = "SELECT * FROM users WHERE pseudo = :login OR email = :login";
  $query = $pdo->prepare($sql);
  $query->bindValue(':login',$login, PDO::PARAM_STR);
  $query->execute();
  $loginVerif = $query->fetch();

  $hashPass = $loginVerif['pass'];

  if (password_verify($pass, $hashPass)) {
    session_start();

      $_SESSION['user']['id'] = $loginVerif['id'];
      $_SESSION['user']['role']= $loginVerif['role'];
      $_SESSION['user']['pseudo'] = $loginVerif['pseudo'];
      $_SESSION['user']['ip'] = $_SERVER['SERVER_ADDR'];
      
      setcookie('reconnect', $loginVerif['id'] . '----' . sha1($loginVerif['pseudo'] . $loginVerif['pass'] . $_SERVER['REMOTE_ADDR']), time() + 3600 + 24 * 3, '/', 'localhost', false, true);
      // $_SESSION['user']['email'] = $loginVerif['email'];
      header('Location: index.php');
    // debug($_SESSION);

  }

}
}

?>

<form action="" method="post">
  <div class="form-group">
      <label for="login">Pseudo ou Email*</label>
      <span class="error"><?php if(!empty($errors['login'])) { echo $errors['login']; } ?></span>
      <input type="text" name="login" id="login" class="form-control" value="<?php if(!empty($_POST['login'])) { echo $_POST['login']; } ?>" />
  </div>

  <div class="form-group">
      <label for="pass">Password*</label>
      <span class="error"><?php if(!empty($errors['pass'])) { echo $errors['pass']; } ?></span>
      <input type="text" name="pass" id="pass" class="form-control" value="<?php if(!empty($_POST['pass'])) { echo $_POST['pass']; } ?>" />
  </div>

<input type="checkbox" name="remember" value="remember"> Se souvenir de moi
  <input type="submit" name="submit" value="Je me connecte" class="btn btn-default" />
</form>
