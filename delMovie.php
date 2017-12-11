<?php include('inc/conf.php'); ?>
<?php
// session_start();
$errors = array();
// debug($_SESSION);
// debug($_SESSION['user']['role']);

if (!empty($_GET['id'])) {
  $id = $_GET['id'];
}else {
  header('Location: dashboard.php');
}
$sql = "SELECT * FROM movies_full WHERE id = '$id'";
$query = $pdo->prepare($sql);
$query->execute();
$del = $query->fetch();
if ($del['id'] == $id) {
  $sql = "DELETE FROM movies_full WHERE id = '$id'";
  $query = $pdo->prepare($sql);
  $query->execute();
  header('Location: dashboard.php');

}
?>



?>
<?php include('inc/headerBO.php'); ?>




<?php include('inc/footerBO.php'); ?>
