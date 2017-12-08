<?php include('inc/fonction.php'); ?>
<?php include('inc/pdo.php'); ?>
<?php
//declare ma requete
$sql= "SELECT * FROM movies_full ORDER BY rand() LiMIT 10 ";
$query = $pdo->prepare($sql);
$query->execute();
$idMovies = $query->fetchall();


// debug($idMovies);



 ?>
<?php include('inc/header.php'); ?>







<?php foreach ($idMovies as $idMovie) {?>
    <a href="details.php?slug=<?php echo $idMovie['slug'];?>"><img src="posters/<?php echo $idMovie['id'] ;?>.jpg" alt=""></a>



 <?php } ?>
<br>
<a href="index.php"> Plus de films</a>



<?php include('inc/footer.php'); ?>
