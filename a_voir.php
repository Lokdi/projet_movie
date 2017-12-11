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
// else {
//   header('Location:404.php');
// }
$id_user = $_SESSION['user']['id'];
$sql = "SELECT * FROM notes WHERE id_user = $id_user ORDER BY created_at DESC";
$query = $pdo->prepare($sql); //je les prepares
$query->execute(); //j'execute
$avoir = $query->fetchAll();

if (!empty($avoir)) {
  debug($avoir);
} else {
  echo 'Liste vide';
}

?>
