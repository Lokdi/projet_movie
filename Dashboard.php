<?php include('inc/conf.php'); ?>
<?php
// session_start();
$errors = array();
// debug($_SESSION);
print_r($_SESSION['user']['role']);


// $page,$limite,$count, $varANourir, $nbPages, $page
// if (is_logged()) {
  if ($_SESSION['user']['role'] == 'admin') {
    $errors['dashboard'] = ' bonjour';
  }else {
    header('Location: 403.php');
  }

$sql = "SELECT * FROM movies_full LIMIT 100";
$query = $pdo->prepare($sql);
$query->execute();
$films = $query->fetchAll();
// debug($films);



?>

<?php include('inc/headerBO.php');?>

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
      <td><a href="details.php?slug=<?php echo $film['slug'];?>">Voir sur le site </a><a href="editMovie.php?id=<?php echo $film['id'];?>"> Modifier </a><a href="effacer"> Effacer </a></td>
    </tr>
      <?php endforeach; ?>
  </tbody>
</table>





<?php include('inc/footerBO.php'); ?>
