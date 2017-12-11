<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/styledetails.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display+SC:400,400i,700,700i,900,900i|Playfair+Display:400,400i,700,700i|Montserrat:400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <title><?= $title ?></title>
  </head>
  <body>
    <header>
      <div id="header">
        <div id="logo">
          <a href="index.php"><img src="./assets/img/logo.png" alt="Page d'accueil" /></a>
        </div>
        <nav id="">
          <ul>
            <li><a href="index.php" alt="Accueil">Accueil</a></li>
            <li><a href="inscription.php" alt="Inscription">Inscription</a></li>
            <li><a href="connection.php" alt="Connexion">Connexion</a></li>
            <?php if (isLogged()): ?>
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
