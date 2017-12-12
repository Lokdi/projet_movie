<?php include('inc/conf.php');
require('vendor/autoload.php');
?>
<?php
// session_start();
$errors = array();
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



?>

<?php include('inc/headerBO.php');?>
<a href="newMovie.php">Ajout d'un nouveau film</a>
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
$sql = "SELECT count(id) FROM movies_full";
$query = $pdo->prepare($sql);
$query->execute();
$count = $query->fetchColumn();

echo $count;




use JasonGrimes\Paginator;

// $totalItems = $count;
// $itemsPerPage = 100;
// $currentPage = 1;
// $urlPattern = '/PHP/movies/projet_movie/dashboard.php/(:num)';

// $paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
$paginator = new Paginator($count, 100, $page, '/PHP/movies/projet_movie/dashboard.php?page=(:num)');

echo $paginator;
?>



<?php include('inc/footerBO.php'); ?>
