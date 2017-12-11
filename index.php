<?php include('inc/fonction.php'); ?>
<?php include('inc/pdo.php'); ?>
<?php
//declare ma requete
include('conf.php');

if (!empty($_POST['submit'])) {

  $sql= "";

  if (!empty($_POST['checkbox'])) {

    $type = $_POST['checkbox'];

    $sql .= "SELECT * FROM movies_full WHERE 1 = 1 AND genres LIKE '%$type%'";
  }
  if (!empty($_POST['popularity'])) {

      $popularity = $_POST['popularity'];
      $popularity = explode('-', $popularity);

      $popularity1 = $popularity[0];
      $popularity2 = $popularity[1];

      $sql .= " AND popularity BETWEEN '$popularity1' AND '$popularity2'";
    }
    if (!empty($_POST['years'])) {

        $years = $_POST['years'];
        $years = explode('-', $years);

        $years1 = $years[0];
        $years2 = $years[1];

        $sql .= " AND year BETWEEN '$years1' AND '$years2'";
      }

      $sql .= "ORDER BY rand() LIMIT 8";
} else {
  $sql= "SELECT * FROM movies_full ORDER BY rand() LIMIT 8 ";
  $query = $pdo->prepare($sql);
  $query->execute();
  $idMovies = $query->fetchall();
}

$query = $pdo->prepare($sql);
$query->execute();
$idMovies = $query->fetchAll();

?>

<?php include('inc/header.php'); ?>

<div id="ecranfilms">
  <div id="listefilms">

    <?php foreach ($idMovies as $idMovie) { ?>
    <div class="movie">
       <a class="linkImage" href="details.php?slug=<?= $idMovie['slug'];?>">
         <?php if (file_exists("posters/".$idMovie['id'].'.jpg') === TRUE) { ?>
         <img width="220" height="330" src="posters/<?= $idMovie['id']; ?>.jpg" alt="Affiche du film : <?= $idMovie['title'];?>, sorti en : <?= $idMovie['year'];?>">
         <h4><?php echo $idMovie['title'] ?></h4>
         <?php } else  { ?>
         <img width="220" height="330" src="./assets/img/sans-couv-220x330px.png" alt="Aucune image disponible">
         <h4><?= $idMovie['title'] ?></h4>
         <?php } ?>
       </a>
    </div>
 <?php } ?>

  </div>
</div>
<div class="hidden">
<div class="form">
  <form action="" method="post">
  <table id="tab1">
    <tr>
      <td>
        <label for="checkAll">Tout cocher/décocher</label>
        <input type="checkbox" name="checkAll" id="checkAll">

        <label for="action">Action</label>
        <input type="checkbox" name="checkbox" id="action" value="action">

        <label for="adventure">Adventure</label>
        <input type="checkbox" name="checkbox" id="adventure" value="adventure">

        <label for="animation">Animation</label>
        <input type="checkbox" name="checkbox" id="animation" value="animation">

        <label for="biography">Biography</label>
        <input type="checkbox" name="checkbox" id="biography" value="biography">

        <label for="comedy">Comedy</label>
        <input type="checkbox" name="checkbox" id="comedy" value="comedy">

        <label for="crime">Crime</label>
        <input type="checkbox" name="checkbox" id="crime" value="crime">

        <label for="documentary">Documentary</label>
        <input type="checkbox" name="checkbox" id="documentary" value="documentary">

        <label for="drama">Drama</label>
        <input type="checkbox" name="checkbox" id="drama" value="drama">

        <label for="family">Family</label>
        <input type="checkbox" name="checkbox" id="family" value="family">

        <label for="fantasy">Fantasy</label>
        <input type="checkbox" name="checkbox" id="fantasy" value="fantasy">

        <label for="film_noir">Film-Noir</label>
        <input type="checkbox" name="checkbox" id="film_noir" value="film_noir">

        <label for="history">History</label>
        <input type="checkbox" name="checkbox" id="history" value="history">

        <label for="horror">Horror</label>
        <input type="checkbox" name="checkbox" id="horror" value="horror">

        <label for="musical">Musical</label>
        <input type="checkbox" name="checkbox" id="musical" value="musical">

        <label for="mystery">Mystery</label>
        <input type="checkbox" name="checkbox" id="mystery" value="mystery">

        <label for="short">Short</label>
        <input type="checkbox" name="checkbox" id="short" value="short">

        <label for="sci_fi">Sci-Fi</label>
        <input type="checkbox" name="checkbox" id="sci_fi" value="sci_fi">

        <label for="sport">Sport</label>
        <input type="checkbox" name="checkbox" id="sport" value="sport">

        <label for="thriller">Thriller</label>
        <input type="checkbox" name="checkbox" id="thriller" value="thriller">

        <label for="romance">Romance</label>
        <input type="checkbox" name="checkbox" id="romance" value="romance">

        <label for="war">War</label>
        <input type="checkbox" name="checkbox" id="war" value="war">

        <label for="western">Western</label>
        <input type="checkbox" name="checkbox" id="western" value="western">
      </td>
    </tr>
  </table>

  Années :
  <select name="years">
    <option name="" value="">???</option>
    <option name="1888-1928" value="1888-1928">1888-1928</option>
    <option name="1928-1968" value="1928-1968">1928-1968</option>
    <option name="1968-1988" value="1968-1988">1968-1988</option>
    <option name="1988-2012" value="1988-2012">1988-2012</option>
  </select>


  Popularité :
  <select name="popularity">
    <option name="" value="">???</option>
    <option name="0-25" value="0-25">0-25</option>
    <option name="25-50" value="25-50">25-50</option>
    <option name="50-75" value="50-75">50-75</option>
    <option name="75-100" value="75-100">75-100</option>
  </select>

  <input type="submit" name="submit" value="Envoyer">
  </form>
</div>
</div>
<?php
// echo  $_POST['date1'] .'-'. $_POST['date2'];
// echo $_POST['popularity'];


// echo $popularity[0] . '<br>';
// echo $popularity[1] . '<br>';
?>

<?php include('inc/footer.php'); ?>
