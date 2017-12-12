<?php
include('conf.php');
// session_start();
// include('inc/pdo.php');
?>
<?php
// Déclaration de quelques variables
$title = 'Les Experts du Cinéma - Page d\'accueil';

//declare ma requete
// debug($_SESSION);
// debug($_COOKIE);
if (!empty($_POST['submit'])) {

  $sql = "";

  if (!empty($_POST['checkbox'])) {

    $type = $_POST['checkbox'];
    $sql = "SELECT * FROM movies_full WHERE 1 = 1 ";
    // debug($type);
    // echo $type[0];

    if (!empty($type[0]) && $type[0] == 'action') { // action
      $sql .= "AND genres LIKE '%$type[0]%'";
    }

    if (!empty($type[1]) && $type[1] == 'adventure') { // adventure
      $sql .= "AND genres LIKE '%$type[1]%'";
    }

    if (!empty($type[2]) && $type[2] == 'animation') { // animation
      $sql .= "AND genres LIKE '%$type[2]%'";
    }

    if (!empty($type[3]) && $type[3] == 'biography') { // biography
      $sql .= "AND genres LIKE '%$type[3]%'";
    }

    if (!empty($type[4]) && $type[4] == 'comedy') { // comedy
      $sql .= "AND genres LIKE '%$type[4]%'";
    }

    if (!empty($type[5]) && $type[5] == 'crime') { // crime
      $sql .= "AND genres LIKE '%$type[5]%'";
    }

    if (!empty($type[6]) && $type[6] == 'documentary') { // documentary
      $sql .= "AND genres LIKE '%$type[6]%'";
    }

    if (!empty($type[7]) && $type[7] == 'drama') { // drama
      $sql .= "AND genres LIKE '%$type[7]%'";
    }

    if (!empty($type[8]) && $type[8] == 'family') { // family
      $sql .= "AND genres LIKE '%$type[8]%'";
    }

    if (!empty($type[9]) && $type[9] == 'fantasy') { // fantasy
      $sql .= "AND genres LIKE '%$type[9]%'";
    }

    if (!empty($type[10]) && $type[10] == 'film_noir') { // thriller
      $sql .= "AND genres LIKE '%$type[10]%'";
    }

    if (!empty($type[11]) && $type[11] == 'history') { // history
      $sql .= "AND genres LIKE '%$type[11]%'";
    }

    if (!empty($type[12]) && $type[12] == 'horror') { // horror
      $sql .= "AND genres LIKE '%$type[12]%'";
    }

    if (!empty($type[13]) && $type[13] == 'musical') { // musical
      $sql .= "AND genres LIKE '%$type[13]%'";
    }

    if (!empty($type[14]) && $type[14] == 'mystery') { // mystery
      $sql .= "AND genres LIKE '%$type[14]%'";
    }

    if (!empty($type[15]) && $type[15] == 'short') { // short
      $sql .= "AND genres LIKE '%$type[15]%'";
    }

    if (!empty($type[16]) && $type[16] == 'sci_fi') { // sci_fi
      $sql .= "AND genres LIKE '%$type[16]%'";
    }

    if (!empty($type[17]) && $type[17] == 'sport') { // sport
      $sql .= "AND genres LIKE '%$type[17]%'";
    }

    if (!empty($type[18]) && $type[18] == 'thriller') { // thriller
      $sql .= "AND genres LIKE '%$type[18]%'";
    }

    if (!empty($type[19]) && $type[19] == 'romance') { // romance
      $sql .= "AND genres LIKE '%$type[19]%'";
    }

    if (!empty($type[20]) && $type[20] == 'war') { // war
      $sql .= "AND genres LIKE '%$type[20]%'";
    }

    if (!empty($type[21]) && $type[21] == 'western') { // western
      $sql .= "AND genres LIKE '%$type[21]%'";
    }

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

} elseif (!empty($_POST['search'])) {
  $search = trim($_POST['search']);

  $sql= "SELECT * FROM movies_full WHERE 1 = 1
        AND title LIKE '%".trim($search)."%'
        OR directors LIKE '%".trim($search)."%'
        OR cast LIKE '%".trim($search)."%'
        ORDER BY rand() LIMIT 8";
  // debug($idMovies);

// si pas de recherche, ni de recherche avancée, alors on fait une requête générale
} else {

  $sql= "SELECT * FROM movies_full ORDER BY rand() LIMIT 8 ";

}

// Exécution de la requête, filtrage et récupération des données des films
$query = $pdo->prepare($sql);
$query->execute();
$idMovies = $query->fetchAll();

// Ici le HTML
?>
<?php include('inc/header.php'); ?>

<div id="ecranfilms">
  <div id="listefilms">

    <?php foreach ($idMovies as $idMovie) { // Affichage des films avec couverture + titre ?>
      <div class="movie">
         <a class="linkImage" href="details.php?slug=<?= $idMovie['slug'];?>">

           <?php if (file_exists("posters/".$idMovie['id'].'.jpg') === TRUE) { ?>
           <img class="imagefilm" width="220" height="330" src="posters/<?= $idMovie['id']; ?>.jpg" alt="Affiche du film : <?= $idMovie['title'];?>, sorti en : <?= $idMovie['year'];?>">
           <div class="titlefilm"><p><?php echo $idMovie['title'] ?></p></div>

           <?php } else  { ?>
           <img class="imagefilm" width="220" height="330" src="./assets/img/sans-couv-220x330px.png" alt="Aucune image disponible">
           <div class="titlefilm"><p><?= $idMovie['title'] ?></p></div>
           <?php } ?>
         </a>
      </div>
 <?php } ?>

  </div>
</div>

<?php
// echo  $_POST['date1'] .'-'. $_POST['date2'];
// echo $_POST['popularity'];


// echo $popularity[0] . '<br>';
// echo $popularity[1] . '<br>';
?>

<?php include('inc/footer.php'); ?>
