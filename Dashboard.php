<?php include('inc/conf.php');
require('vendor/autoload.php');
?>
<?php
// session_start();
$errors = array();
$date   = date('d-m-Y');
// debug($_SESSION);
print_r($_SESSION['user']['role']);

$page = 1;
//   //nb de depart
$depart = 0;
//   //nb par page
$limite = 100;

if (!empty($_GET['page'])) {
  $page = $_GET['page'];
  $depart = ($page * $limite)-$limite;
}
// $page,$limite,$count, $varANourir, $nbPages, $page
// if (is_logged()) {
  if ($_SESSION['user']['role'] == 'admin') {
    $errors['dashboard'] = ' bonjour';
  }else {
    header('Location: 403.php');
  }

$sql = "SELECT * FROM movies_full LIMIT $depart,$limite";
$query = $pdo->prepare($sql);
$query->execute();
$films = $query->fetchAll();
// debug($films);

$sql = "SELECT count(id) FROM movies_full";
$query = $pdo->prepare($sql);
$query->execute();
$count = $query->fetchColumn();

$sql = "SELECT count(id) FROM users";
$query = $pdo->prepare($sql);
$query->execute();
$countUsers = $query->fetchColumn();
// echo $countUsers;
$sql = "SELECT count(id) FROM users WHERE created_at > (NOW() - INTERVAL 5 WEEK)";
$query = $pdo->prepare($sql);
$query->execute();
$countUsersLast7Weeks = $query->fetchColumn();
// echo $countUsersLast7Weeks;

use JasonGrimes\Paginator;

$paginator = new Paginator($count, 100, $page, '/PHP/movies/projet_movie/dashboard.php?page=(:num)');

        $sql = "SELECT count(id_movie),id_movie, movies_full.title FROM notes
                LEFT JOIN movies_full
                ON notes.id_movie = movies_full.id GROUP BY id_movie
                ORDER BY count(id_movie) DESC LIMIT 30";
        $query = $pdo->prepare($sql);
        $query->execute();
        $files = $query->fetchAll();
        // debug($files);
?>

<?php include('inc/headerBO.php');
?>

    <h3>Statistiques </h3>
      <p>Il y a actuellement : <?php echo $count ?>  films dans la base de donnée . </p>
      <p>Nous avons : <?php echo $countUsers ?>  utilisateurs d'inscrit à ce jour . </p>
      <p>Le nombre d'utilisateur incrit lors de 7 dernieres semaines : <?php echo $countUsersLast7Weeks ?> utilisateurs</p>
        <ul>
            <?php foreach ($files as $file): ?>
              <li><?php echo $file['title'];  ?></li>
            <?php endforeach; ?>
        </ul>
  <?php echo $paginator; ?>

<a href="newMovie.php">Ajout d'un nouveau film</a>
<br>
<a href="statsUser.php">Liste des utilisateurs.</a>





<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Year</th>
      <th scope="col">rating</th>
      <th scope="col">actions</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <?php foreach ($films as $film): ?>


      <th scope="row"><?php echo $film['id'] ?></th>
      <td><?php echo $film['title'] ?></td>
      <td><?php echo $film['year'] ?></td>
      <td><?php echo $film['rating'] ?></td>
      <td><a href="details.php?slug=<?php echo $film['slug'];?>">Voir </a><a href="editMovie.php?id=<?php echo $film['id'];?>">Modifier </a><a href="delMovie.php?id=<?php echo $film['id'];?>" onclick="return confirm('es-tu sûr?');">Effacer </a></td>
    </tr>
      <?php endforeach; ?>
  </tbody>
</table>
<?php








echo $paginator;
?>



<?php include('inc/footerBO.php'); ?>
