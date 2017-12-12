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

$sql = "SELECT * FROM users ";
$query = $pdo->prepare($sql);
$query->execute();
$users = $query->fetchAll();
// debug($films);



?>

<?php include('inc/headerBO.php');?>
<a href="dashboard.php">retour dashboard</a>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">pseudo</th>
      <th scope="col">email</th>
      <th scope="col">pass</th>
      <th scope="col">token</th>
      <th scope="col">role</th>
      <th scope="col">created_at</th>
      <th scope="col">status</th>
      <th scope="col">Détails</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <?php foreach ($users as $user): ?>


      <th scope="row"><?php echo $user['id'] ?></th>
      <td><?php echo $user['pseudo'] ?></td>
      <td><?php echo $user['email'] ?></td>
      <td><?php echo $user['pass'] ?></td>
      <td><?php echo $user['token'] ?></td>
      <td><?php echo $user['role'] ?></td>
      <td><?php echo $user['created_at'] ?></td>
      <td><?php echo $user['status'] ?></td>

      <td><a href="editUser.php?id=<?php echo $user['id'];?>">Modifier </a><a href="delUser.php?id=<?php echo $user['id'];?>" onclick="return confirm('es-tu sûr?');">Effacer </a></td>

    </tr>
      <?php endforeach; ?>
  </tbody>
</table>





<?php include('inc/footerBO.php'); ?>
