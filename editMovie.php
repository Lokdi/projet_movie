<?php include('inc/conf.php'); ?>
<!-- <?php include('inc/fonctions.php'); ?> -->
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
        debug($idMovie);
          if(empty($idMovie)) {
              header('Location: dashboard.php');
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
    <span ><?php if(!empty($errors['nameFilm'])) { echo $errors['nameFilm'];}?></span>


    <!-- titre en SLUG  -->
    <label class="labelText" for="NameFilm">Slug du film : </label>

    <input class="inputNewPost" type="text" name="slug" id='article' value="<?php if(!empty($_POST['slug'])) {echo $_POST['slug']; } else { if(!empty($idMovie['slug'])) {echo $idMovie['slug']; }} ?>">
    <!-- span vide mettre errors ici  -->
    <span ><?php if(!empty($errors['slug'])) { echo $errors['slug'];}?></span>

    <!-- Année du film -->
    <label class="labelText" for="year">année du film : </label>
    <select class="selectClass" name="year">
      <?php for ($i = 1900; $i < 2017 ; $i++) { ?>
      <option name="year" value="<?php if(!empty($_POST['year'])) {echo $_POST['year']; } else { if(!empty($idMovie['year'])) {echo $idMovie['year']; }} ?>" ><?php echo $i; ?></option>
    <?php    } ?>
    </select>

    <!-- Genre  -->

    <label class="labelText" for="genre">Genre du film : </label>
<br>
    <input type="checkbox" name="checkbox" id="action" value="action">
    <label for="action">Action</label>
  <br>
    <input type="checkbox" name="checkbox" id="adventure" value="adventure">
    <label for="adventure">Adventure</label>
  <br>

    <input type="checkbox" name="checkbox" id="animation" value="animation">
    <label for="animation">Animation</label>
  <br>

    <input type="checkbox" name="checkbox" id="biography" value="biography">
    <label for="biography">Biography</label>
  <br>

    <input type="checkbox" name="checkbox" id="comedy" value="comedy">
    <label for="comedy">Comedy</label>
  <br>

    <input type="checkbox" name="checkbox" id="crime" value="crime">
    <label for="crime">Crime</label>
  <br>

    <input type="checkbox" name="checkbox" id="documentary" value="documentary">
    <label for="documentary">Documentary</label>
  <br>
    <input type="checkbox" name="checkbox" id="drama" value="drama">
    <label for="drama">Drama</label>
  <br>
    <input type="checkbox" name="checkbox" id="family" value="family">
    <label for="family">Family</label>
  <br>
    <input type="checkbox" name="checkbox" id="fantasy" value="fantasy">
    <label for="fantasy">Fantasy</label>
  <br>
    <input type="checkbox" name="checkbox" id="film_noir" value="film_noir">
    <label for="film_noir">Film-Noir</label>

  </div>
  <div class="input">
    <input type="checkbox" name="checkbox" id="history" value="history">
    <label for="history">History</label>
  <br>

    <input type="checkbox" name="checkbox" id="horror" value="horror">
    <label for="horror">Horror</label>
  <br>

    <input type="checkbox" name="checkbox" id="musical" value="musical">
    <label for="musical">Musical</label>
  <br>

    <input type="checkbox" name="checkbox" id="mystery" value="mystery">
    <label for="mystery">Mystery</label>
  <br>

    <input type="checkbox" name="checkbox" id="short" value="short">
    <label for="short">Short</label>
  <br>

    <input type="checkbox" name="checkbox" id="sci_fi" value="sci_fi">
    <label for="sci_fi">Sci-Fi</label>
  <br>

    <input type="checkbox" name="checkbox" id="sport" value="sport">
    <label for="sport">Sport</label>
  <br>

    <input type="checkbox" name="checkbox" id="thriller" value="thriller">
    <label for="thriller">Thriller</label>
  <br>

    <input type="checkbox" name="checkbox" id="romance" value="romance">
    <label for="romance">Romance</label>
  <br>

    <input type="checkbox" name="checkbox" id="war" value="war">
    <label for="war">War</label>
  <br>
    <input type="checkbox" name="checkbox" id="western" value="western">
    <label for="western">Western</label>
<br>

<!-- Synopsis  -->
<label class="labelText" for="plot">synospsis : </label>
<br>
<textarea name="plot" rows="8" cols="80"><?php if(!empty($_POST['plot'])) {echo $_POST['plot']; } else { if(!empty($idMovie['plot'])) {echo $idMovie['plot']; }} ?></textarea>
<!-- span vide mettre errors ici  -->
<span ><?php if(!empty($errors['plot'])) { echo $errors['plot'];}?></span>
<br>
<!-- Directors  -->
<label class="labelText" for="directors">Directors : </label>

<input class="inputNewPost" type="text" name="directors" id='article' value="<?php if(!empty($_POST['directors'])) {echo $_POST['directors']; } else { if(!empty($idMovie['directors'])) {echo $idMovie['directors']; }} ?>">
<!-- span vide mettre errors ici  -->
<span ><?php if(!empty($errors['directors'])) { echo $errors['directors'];}?></span>
<br>
<!-- casting  -->
<label class="labelText" for="cast">Casting : </label>

<input class="inputNewPost" type="text" name="cast" id='article' value="<?php if(!empty($_POST['cast'])) {echo $_POST['cast']; } else { if(!empty($idMovie['cast'])) {echo $idMovie['cast']; }} ?>">
<!-- span vide mettre errors ici  -->
<span ><?php if(!empty($errors['cast'])) { echo $errors['cast'];}?></span>
<br>

<!-- writers  -->
<label class="labelText" for="writers">Scénariste : </label>

<input class="inputNewPost" type="text" name="writers" id='article' value="<?php if(!empty($_POST['writers'])) {echo $_POST['writers']; } else { if(!empty($idMovie['writers'])) {echo $idMovie['writers']; }} ?>">
<!-- span vide mettre errors ici  -->
<span ><?php if(!empty($errors['writers'])) { echo $errors['writers'];}?></span>


  <input type="submit" name="submitted" value="Envoyer">
</form>


<label class="labelText" for="runtime">durée du film : </label>
<select class="selectClass" name="runtime">
  <?php for ($i = 00; $i < 150 ; $i++) { ?>
  <option name="runtime" value="" ><?php echo $i; ?></option>
<?php    } ?>
</select>


<?php include('inc/footerBO.php'); ?>
