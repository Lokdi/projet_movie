<?php include('inc/conf.php'); ?>
<?php
// session_start();
$errors = array();
// debug($_SESSION);
// debug($_SESSION['user']['role']);
if (!empty($_GET['id']) && is_numeric($_GET['id'])) {
  $id = $_GET['id'];
  // echo $id;
        $sql = "SELECT * FROM movies_full WHERE id = :id";
        $query = $pdo->prepare($sql);
        $query ->bindValue (':id', $id, PDO::PARAM_INT);
        $query->execute();
        $idMovie = $query->fetch();
        // debug($idMovie);
          if(empty($idMovie)) {
              header('Location: dashboard.php');
          }else {
              if(!empty($_POST['submitted'])) {
                $slug               = trim(strip_tags($_POST['slug']));
                $nameFilm           = trim(strip_tags($_POST['nameFilm']));
                $year               = trim(strip_tags($_POST['year']));
                $genre              = trim(strip_tags($_POST['genre']));
                $plot               = trim(strip_tags($_POST['plot']));
                $directors          = trim(strip_tags($_POST['directors']));
                $cast               = trim(strip_tags($_POST['cast']));
                $writers            = trim(strip_tags($_POST['writers']));
                $runtime            = trim(strip_tags($_POST['runtime']));
                $rating             = trim(strip_tags($_POST['rating']));
                $popularity         = trim(strip_tags($_POST['popularity']));
                  if(count($errors) == 0) {
                    $success = true;
                    $sqlUpdate =  "UPDATE Movies_full SET slug = :slug, title = :nameFilm, year = :year, genres = :genre, plot = :plot, directors = :directors, cast = :cast, writers = :writers, runtime  = :runtime, rating = :rating, popularity = :popularity, modified = NOW() WHERE id = $id";
                    $query = $pdo->prepare($sqlUpdate);
                    $query ->bindValue (':slug', $slug, PDO::PARAM_STR);
                    $query ->bindValue (':nameFilm', $nameFilm, PDO::PARAM_STR);
                    $query ->bindValue (':year', $year, PDO::PARAM_INT);
                    $query ->bindValue (':genre', $genre, PDO::PARAM_STR);
                    $query ->bindValue (':plot', $plot, PDO::PARAM_STR);
                    $query ->bindValue (':directors', $directors, PDO::PARAM_STR);
                    $query ->bindValue (':cast', $cast, PDO::PARAM_STR);
                    $query ->bindValue (':writers', $writers, PDO::PARAM_STR);
                    $query ->bindValue (':runtime', $runtime, PDO::PARAM_INT);
                    $query ->bindValue (':rating', $rating, PDO::PARAM_INT);
                    $query ->bindValue (':popularity', $popularity, PDO::PARAM_INT);
                    $query->execute();
                    header('Location: dashboard.php');

                  }
              }
          }
}
?>
<?php include('inc/headerBO.php'); ?>

<form class="" action="" method="post">
    <h2 class="h2NewPost">Modification du film :</h2>
        <br>
          <!-- titre film  -->
          <label class="labelText" for="NameFilm">Nom du film : </label>

          <input class="inputNewPost" type="text" name="nameFilm" id='article' value="<?php if(!empty($_POST['nameFilm'])) {echo $_POST['nameFilm']; } else { if(!empty($idMovie['title'])) {echo $idMovie['title']; }} ?>">
          <!-- span vide mettre errors ici  -->


          <!-- titre en SLUG  -->
          <label class="labelText" for="NameFilm">Slug du film : </label>

          <input class="inputNewPost" type="text" name="slug" id='article' value="<?php if(!empty($_POST['slug'])) {echo $_POST['slug']; } else { if(!empty($idMovie['slug'])) {echo $idMovie['slug']; }} ?>">
          <!-- span vide mettre errors ici  -->

          <!-- Année du film -->
          <label class="labelText" for="year">année du film : </label>

          <input type="number" name="year" value="<?php if(!empty($_POST['year'])) {echo $_POST['year']; } else { if(!empty($idMovie['year'])) {echo $idMovie['year']; }} ?>">

          <!-- Genre  -->

          <label class="labelText" for="genre">Genre : </label>
          <br>
          <textarea name="genre" rows="8" cols="30"><?php if(!empty($_POST['genre'])) {echo $_POST['genre']; } else { if(!empty($idMovie['genre'])) {echo $idMovie['genre']; }} ?></textarea>
          <!-- span vide mettre errors ici  -->
          <br>

          <!-- Synopsis  -->
          <label class="labelText" for="plot">synospsis : </label>
          <br>
          <textarea name="plot" rows="8" cols="80"><?php if(!empty($_POST['plot'])) {echo $_POST['plot']; } else { if(!empty($idMovie['plot'])) {echo $idMovie['plot']; }} ?></textarea>
          <!-- span vide mettre errors ici  -->
          <br>
          <!-- Directors  -->
          <label class="labelText" for="directors">Directors : </label>

          <input class="inputNewPost" type="text" name="directors" id='article' value="<?php if(!empty($_POST['directors'])) {echo $_POST['directors']; } else { if(!empty($idMovie['directors'])) {echo $idMovie['directors']; }} ?>">
          <!-- span vide mettre errors ici  -->
          <br>
          <!-- casting  -->
          <label class="labelText" for="cast">Casting : </label>

          <input class="inputNewPost" type="text" name="cast" id='article' value="<?php if(!empty($_POST['cast'])) {echo $_POST['cast']; } else { if(!empty($idMovie['cast'])) {echo $idMovie['cast']; }} ?>">
          <!-- span vide mettre errors ici  -->
          <br>

          <!-- writers  -->
          <label class="labelText" for="writers">Scénariste : </label>

          <input class="inputNewPost" type="text" name="writers" id='article' value="<?php if(!empty($_POST['writers'])) {echo $_POST['writers']; } else { if(!empty($idMovie['writers'])) {echo $idMovie['writers']; }} ?>">
          <!-- span vide mettre errors ici  -->

          <label class="labelText" for="runtime">durée du film : </label>
          <input type="number" name="runtime" value="<?php if(!empty($_POST['runtime'])) {echo $_POST['runtime']; } else { if(!empty($idMovie['runtime'])) {echo $idMovie['runtime']; }} ?>">


          <label class="labelText" for="rating">Note : </label>

          <input type="number" name="rating" value="<?php if(!empty($_POST['rating'])) {echo $_POST['rating']; } else { if(!empty($idMovie['rating'])) {echo $idMovie['rating']; }} ?>">




          <label class="labelText" for="popularity">Popularité : </label>
          <input type="number" name="popularity" value="<?php if(!empty($_POST['popularity'])) {echo $_POST['popularity']; } else { if(!empty($idMovie['popularity'])) {echo $idMovie['popularity']; }} ?>">



            <input type="submit" name="submitted" value="Envoyer">
</form>



<?php include('inc/footerBO.php'); ?>
