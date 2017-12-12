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

            <?php if (!isLogged()): ?>
              <li><a href="inscription.php" alt="Inscription">Inscription</a></li>
              <li><a href="connection.php" alt="Connexion">Connexion</a></li>
            <?php endif; ?>

            <?php if (isLogged()): ?>
              <li><a href="a_voir.php" alt="Liste des films à voir">Films à voir</a></li>
              <li><a href="deco.php" alt="Déconnection">Déconnecter</a></li>
            <?php endif; ?>
            <?php if (isLogged() && $_SESSION['user']['role'] === 'admin'): ?>
              <li><a href="dashboard.php">Admin</a></li>
            <?php endif; ?>
            <?php if (isOnPage('index.php')): ?>
              <li><a id="btnFiltres" href="#" alt="Filtrer par genre, date et popularité">Filtrer</a></li>
            <?php endif; ?>

          </ul>

          <form id="recherche" method="post" action="index.php">
            <input id="search" class="loupe" name="search" type="text" placeholder="Recherche..." required />
            <input id="submitsearch" type="submit" name="submitsearch" value="OK" />
          </form>
        </nav>

        <div id="formFiltrage">
          <div>
            <form action="" method="post">
              Genres :
              <select name="checkbox[]" id="selectmultiple" type="select" multiple size="2">

                <option value="action" <?php if((!empty($type[0]) && $type[0] == 'action')): ?> selected <?php endif; ?>>Action</option>
                <option value="adventure" <?php if((!empty($type[1]) && $type[1] == 'adventure')): ?> selected <?php endif; ?>>Aventure</option>
                <option value="animation" <?php if((!empty($type[2]) && $type[2] == 'animation')): ?> selected <?php endif; ?>>Animation</option>
                <option value="biography" <?php if((!empty($type[3]) && $type[3] == 'biography')): ?> selected <?php endif; ?>>Biographie</option>
                <option value="comedy" <?php if((!empty($type[4]) && $type[4] == 'comedy')): ?> selected <?php endif; ?>>Comedie</option>
                <option value="crime" <?php if((!empty($type[5]) && $type[5] == 'crime')): ?> selected <?php endif; ?>>Crime</option>
                <option value="documentary" <?php if((!empty($type[6]) && $type[6] == 'documentary')): ?> selected <?php endif; ?>>Documentaire</option>
                <option value="drama" <?php if((!empty($type[7]) && $type[7] == 'drama')): ?> selected <?php endif; ?>>Drame</option>
                <option value="family" <?php if((!empty($type[8]) && $type[8] == 'family')): ?> selected <?php endif; ?>>Famille</option>
                <option value="fantasy" <?php if((!empty($type[9]) && $type[9] == 'fantasy')): ?> selected <?php endif; ?>>Fantastique</option>
                <option value="film_noir" <?php if((!empty($type[10]) && $type[10] == 'film_noir')): ?> selected <?php endif; ?>>Film noir</option>
                <option value="history" <?php if((!empty($type[11]) && $type[11] == 'history')): ?> selected <?php endif; ?>>Histoire</option>
                <option value="horror" <?php if((!empty($type[12]) && $type[12] == 'horror')): ?> selected <?php endif; ?>>Horreur</option>
                <option value="musical" <?php if((!empty($type[13]) && $type[13] == 'musical')): ?> selected <?php endif; ?>>Musical</option>
                <option value="mystery" <?php if((!empty($type[14]) && $type[14] == 'mystery')): ?> selected <?php endif; ?>>Mystère</option>
                <option value="short" <?php if((!empty($type[15]) && $type[15] == 'short')): ?> selected <?php endif; ?>>short</option>
                <option value="sci_fi" <?php if((!empty($type[16]) && $type[16] == 'sci_fi')): ?> selected <?php endif; ?>>Science-fiction</option>
                <option value="sport" <?php if((!empty($type[17]) && $type[17] == 'sport')): ?> selected <?php endif; ?>>sport</option>
                <option value="thriller" <?php if((!empty($type[18]) && $type[18] == 'thriller')): ?> selected <?php endif; ?>>Policier</option>
                <option value="romance" <?php if((!empty($type[19]) && $type[19] == 'romance')): ?> selected <?php endif; ?>>Romantique</option>
                <option value="war" <?php if((!empty($type[20]) && $type[20] == 'war')): ?> selected <?php endif; ?>>Guerre</option>
                <option value="western" <?php if((!empty($type[21]) && $type[21] == 'western')): ?> selected <?php endif; ?>>Western</option>
              </select>

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
      </div>
    </header>
    <div id="wrapper">
      <div class="wrap">
      </div>
      <div id="content">
