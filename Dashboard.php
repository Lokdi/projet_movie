<?php include('inc/fonctions.php'); ?>
<?php include('inc/pdo.php'); ?>
<?php
session_start();
$errors = array();
debug($_SESSION);

if (!empty($_SESSION['user']['pseudo']) && !empty($_SESSION['user']['id']) && !empty($_SESSION['user']['role'] == 'admin') && !empty($_SESSION['user']['ip'])) {
echo 'bonjour';
$ip = $_SERVER['REMOTE_ADDR'];
  if ($ip == $_SESSION['user']['ip']) {
  }
}

?>
<?php include('inc/headerBO.php'); ?>

<?php include('inc/footerBO.php'); ?>
