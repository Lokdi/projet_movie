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


// $sql = "SELECT n.id_user AS id_user, mf.title AS title, n.note AS note, mf.id AS id_movie, n.created_at AS created_at
//         FROM notes AS n
//         LEFT JOIN movies_full AS mf
//         ON id_user = $id_user AND id_movie = $id_movie ORDER BY created_at DESC";

$sql = "SELECT n.note AS note, mf.title AS title, mf.id AS id_movie
        FROM notes AS n
        LEFT JOIN movies_full AS mf
        ON mf.id = n.id_movie ";
$query = $pdo->prepare($sql); //je les prepares
$query->execute(); //j'execute
$avoir = $query->fetchAll();
if (!empty($avoir)) {
  debug($avoir);
?>
<?php foreach ($avoir as $key => $value): ?>
  <?php echo $value['title'];
  echo $id_movie = $value['id_movie'];
  ?>
   <form class="" action="" method="post">
     <label for="<?php echo $key ?>" class="my-rating-8"></label>
     <?php echo $key ?>
    <input type="radio" id="<?php echo $key ?>" name="rating" value="" class="live-rating">
    <input type="text" id="movie" name="id_movie" value="<?php echo $id_movie ?>">
    <input type="submit" name="submit" value="Mettre la note">
    <?php echo $id_movie; ?>
  </form>
<?php endforeach;?>

<?php echo $_POST['rating']; ?>

<?php if (!empty($_POST['submit']) && is_numeric($_POST['rating'])) {
  $note = $_POST['rating'];

echo $_POST['rating'];
$id_movie = $_POST['id_movie'];
echo $id_movie;
  $sql = "UPDATE notes SET note = :note WHERE id_user = :id_user AND id_movie = :id_movie";
  $query = $pdo->prepare($sql); //je les prepares
  $query->bindValue(':note', $note, PDO::PARAM_STR);
  $query->bindValue(':id_user', $id_user, PDO::PARAM_STR);
  $query->bindValue(':id_movie', $id_movie, PDO::PARAM_STR);
  $query->execute(); //j'execute
  // $avoir = $query->fetchAll();
  // debug($value);

} ?>
<?php
} else {
  echo 'Liste vide';
} ?>

<?php include('inc/footer.php'); ?>

<!-- ?> -->
