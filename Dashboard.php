<?php include('conf.php'); ?>

<?php
$errors = array();
debug($_SESSION);
debug($_COOKIE);

if (isLogged()) {
  if ($_SESSION['user']['role'] === 'admin') {
    echo 'ok';
  }
}
// else {
//   header('Location:connection.php');
// }


?>
<?php include('inc/headerBO.php'); ?>

<?php include('inc/footerBO.php'); ?>
