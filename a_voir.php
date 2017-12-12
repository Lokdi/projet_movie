<?php
include('conf.php');

if (!empty($_GET['id']) && is_numeric($_GET['id'])) {
  $id_movie = $_GET['id'];
  // echo $id;
  debug($_SESSION);
  $id_user = $_SESSION['user']['id'];
  $sql = "SELECT * FROM notes WHERE id_user = $id_user AND id_movie = $id_movie";
  $query = $pdo->prepare($sql); //je les prepares
  $query->bindValue(':id_movie', $id_movie, PDO::PARAM_STR);
  $query->bindValue(':id_user', $id_user, PDO::PARAM_STR);
  $query->execute(); //j'execute
  $verifMoviesId = $query->fetchAll();

  if (!empty($verifMoviesId)) {
    echo 'vous avez deja ajouter ce film';
  } else {
    # code...
    $sql = "INSERT INTO notes (id_movie, id_user, created_at, note) VALUES (:id_movie, :id_user, NOW(), NULL)";
    $query = $pdo->prepare($sql); //je les prepares
    $query->bindValue(':id_movie', $id_movie, PDO::PARAM_STR);
    $query->bindValue(':id_user', $id_user, PDO::PARAM_STR);
    $query->execute(); //j'execute
    // $movie = $query->fetch();
    header('Location:index.php');
    // echo 'ok';
  }

}
include('inc/header.php');
// else {
//   header('Location:404.php');
// }
$id_user = $_SESSION['user']['id'];
////////////////////////////////////////////////////////////////////////////////////
// FAIRE une jointure pour aller chercher le titre du film ++++
// On prends que ceux qui n'ont pas de note =>   note IS NULL (sql.sh)
////////////////////////////////////////////////////////////////////////////////////


// $sql = "SELECT * FROM notes WHERE id_user = $id_user";


$sql = "SELECT n.id_user AS id_user, mf.title AS title, n.note AS note
        FROM notes AS n
        LEFT JOIN movies_full AS mf
        ON id_user = $id_user AND note IS NULL ORDER BY n.created_at DESC";
$query = $pdo->prepare($sql); //je les prepares
$query->execute(); //j'execute
$avoir = $query->fetchAll();

if (!empty($avoir)) {
  debug($avoir);
?>
<div class="my-rating-8"></div>

 <form class="" action="" method="post">
  <input type="hidden" id="rating" name="rating" value="" class="live-rating">
  <input type="submit" name="submit" value="Mettre la note">
</form>
<?php if (!empty($_POST['submit'])) {

} ?>
<?php
} else {
  echo 'Liste vide';
} ?>

<?php include('inc/footer.php'); ?>

<!-- ?> -->
