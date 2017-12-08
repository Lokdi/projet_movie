<?php
include('inc/pdo.php');
include('inc/fonction.php');

if (!empty($_GET['slug'])) {
    $slug = $_GET['slug'];
} else {
    die('4049');   //sinon si l'slug n'existe pas ou n'est pas valide  404
}
    $sql = "SELECT * FROM movies_full WHERE slug = :slug";
    $query = $pdo->prepare($sql); //je les prepares
    // bind value
    $query->bindValue(':slug', $slug, PDO::PARAM_STR);
    $query->execute(); //j'execute
    $movie = $query->fetch();

if(empty($movie)) {
    die('4042');
}



include('inc/header.php');?>

        <div class="wrap">

            
            <div class="">
              <p><a href="index.php">retour aux films</a></p>
            </div>


            <p>title : <?php echo $movie['title']; ?></p>
            <p>year : <?php echo $movie['year']; ?></p>
            <p>genre : <?php echo $movie['genre']; ?></p>
            <p>plot : <?php echo $movie['plot']; ?></p>
            <p>directors : <?php echo $movie['directors']; ?></p>
            <p>cast : <?php echo $movie['cast']; ?></p>
            <p>writers : <?php echo $movie['writers']; ?></p>
            <p>runtime : <?php echo $movie['runtime']; ?></p>
            <p>mpaa : <?php echo $movie['mpaa']; ?></p>
            <p>rating : <?php echo $movie['rating']; ?></p>
            <p>popularity : <?php echo $movie['popularity']; ?></p>
            <p>modified : <?php echo $movie['modified']; ?></p>
            <p>created : <?php echo $movie['created']; ?></p>
            <p>poster_flag : <?php echo $movie['poster_flag']; ?></p>



        </div>



<?php
include('inc/footer.php');
