<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/styledetails.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css"> -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script> -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display+SC:400,400i,700,700i,900,900i|Playfair+Display:400,400i,700,700i|Montserrat:400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="star-rating-svg.css">


    <title><?= $title ?></title>
  </head>
  <body>
    <header>
      <div id="header">
        <div id="logo">
          <a href="index.php"><img src="./assets/img/logo.png" alt="Page d'accueil" /></a>
        </div>
        <nav id="navigation">
          <ul>
            <li><a href="index.php" alt="Accueil">Accueil</a></li>


            <?php // on affiche le filtre uniquement sur la page d'accueil
            $page = basename($_SERVER["PHP_SELF"]); // echo $page;
            if (!empty($page) && $page == 'index.php' ):
             ?>
            <li><a href="#formfiltrage" class="nohidden" alt="Filtrer par genre, date et popularité">Filtrer</a></li>
            <?php endif; ?>

            <?php if (!isLogged()): ?>
              <li><a href="inscription.php" alt="Inscription">Inscription</a></li>
              <li><a href="connection.php" alt="Connexion">Connexion</a></li>
            <?php endif; ?>
            <?php if (isLogged()): ?>
              <li><a href="deco.php">Deconnecter</a></li>
              <li><a href="a_voir.php" alt="Liste des films a voir">Liste des films a voir</a></li>
            <?php endif; ?>

          </ul>
          <form id="recherche" method="post" action="index.php">
            <input id="search" class="loupe" name="search" type="text" placeholder="Recherche..." required />
            <input id="submitsearch" type="submit" name="submitsearch" value="OK" />
          </form>
        </nav>
      </div>
    </header>
    <div id="wrapper">
      <div class="wrap">
      </div>
      <div id="content">
