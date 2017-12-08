<?php include('inc/fonction.php'); ?>
<?php include('inc/pdo.php'); ?>
<?php
//declare ma requete
$sql= "SELECT * FROM movies_full ORDER BY rand() LiMIT 10 ";
$query = $pdo->prepare($sql);
$query->execute();
$idMovies = $query->fetchall();

if (!empty($_POST['submit'])) {

  $years1 = $years[0];
  $years2 = $years[1];

  $popularity1 = $popularity[0];
  $popularity2 = $popularity[1];

  $type = $_POST['type']

  $sql = "SELECT * FROM movies_full WHERE year BETWEEN $years1 AND $years2 AND $popularity1 AND $popularity2"
}
?>
<?php 
// debug($idMovies);



 ?>
<?php include('inc/header.php'); ?>
<h1>Accueil</h1>
<!--  1888/1928   1928/1968  1968/1998  1998/2012  -->

<!-- for ($i=1928; $i < 1968 ; $i++) {
  # code...
}

for ($i=1968; $i < 1998 ; $i++) {
  # code...
}

for ($i=1998; $i < 2012 ; $i++) {
  # code...
}
?> -->
<form action="" method="post">
<table id="tab1">
  <tr>
    <td>
      <style media="screen">
        /*label{
          display: block;
        }*/
      </style>
      <label for="checkAll">Tout cocher/décocher</label>
      <input type="checkbox" name="checkAll" id="checkAll">

      <label for="action">Action</label>
      <input type="checkbox" name="action" id="action" value="action">

      <label for="adventure">Adventure</label>
      <input type="checkbox" name="adventure" id="adventure" value="adventure">

      <label for="animation">Animation</label>
      <input type="checkbox" name="animation" id="animation" value="animation">

      <label for="biography">Biography</label>
      <input type="checkbox" name="biography" id="biography" value="biography">

      <label for="comedy">Comedy</label>
      <input type="checkbox" name="comedy" id="comedy" value="comedy">

      <label for="crime">Crime</label>
      <input type="checkbox" name="crime" id="crime" value="crime">

      <label for="documentary">Documentary</label>
      <input type="checkbox" name="documentary" id="documentary" value="documentary">

      <label for="drama">Drama</label>
      <input type="checkbox" name="drama" id="drama" value="drama">

      <label for="family">Family</label>
      <input type="checkbox" name="family" id="family" value="family">

      <label for="fantasy">Fantasy</label>
      <input type="checkbox" name="fantasy" id="fantasy" value="fantasy">

      <label for="film_noir">Film-Noir</label>
      <input type="checkbox" name="film_noir" id="film_noir" value="film_noir">

      <label for="history">History</label>
      <input type="checkbox" name="history" id="history" value="history">

      <label for="horror">Horror</label>
      <input type="checkbox" name="horror" id="horror" value="horror">

      <label for="musical">Musical</label>
      <input type="checkbox" name="musical" id="musical" value="musical">

      <label for="mystery">Mystery</label>
      <input type="checkbox" name="mystery" id="mystery" value="mystery">

      <label for="short">Short</label>
      <input type="checkbox" name="short" id="short" value="short">

      <label for="sci_fi">Sci-Fi</label>
      <input type="checkbox" name="sci_fi" id="sci_fi" value="sci_fi">

      <label for="sport">Sport</label>
      <input type="checkbox" name="sport" id="sport" value="sport">

      <label for="thriller">Thriller</label>
      <input type="checkbox" name="thriller" id="thriller" value="thriller">

      <label for="romance">Romance</label>
      <input type="checkbox" name="romance" id="romance" value="romance">

      <label for="war">War</label>
      <input type="checkbox" name="war" id="war" value="war">

      <label for="western">Western</label>
      <input type="checkbox" name="western" id="western" value="western">
    </td>
  </tr>
</table>

Années :
<select name="years">
  <option name="1888-1928" value="1888-1928">1888-1928</option>
  <option name="1928-1968" value="1928-1968">1928-1968</option>
  <option name="1968-1988" value="1968-1988">1968-1988</option>
  <option name="1988-2012" value="1988-2012">1988-2012</option>
</select>


Popularité :
<select name="popularity">
  <option name="0-25" value="0-25">0-25</option>
  <option name="25-50" value="25-50">25-50</option>
  <option name="50-75" value="50-75">50-75</option>
  <option name="75-100" value="75-100">75-100</option>
</select>

<input type="submit" name="submit" value="Envoyer">
</form>

<?php
// echo  $_POST['date1'] .'-'. $_POST['date2'];
// echo $_POST['popularity'];

$popularity = $_POST['popularity'];
$years = $_POST['years'];

$popularity = explode('-', $popularity);
$years = explode('-', $years);

// echo $popularity[0] . '<br>';
// echo $popularity[1] . '<br>';
?>







<?php foreach ($idMovies as $idMovie) {?>
    <a href="details.php?slug=<?php echo $idMovie['slug'];?>"><img src="posters/<?php echo $idMovie['id'] ;?>.jpg" alt=""></a>



 <?php } ?>
<br>
<a href="index.php"> Plus de films</a>



<?php include('inc/footer.php'); ?>
