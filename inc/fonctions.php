<?php
function debug($tableau){
  echo '<pre>';
    print_r($tableau);
  echo '</pre>';
}

function pagination($page,$limite,$count, $varANourir, $nbPages, $page){
  if ($page != 1) {
    echo'<li class="page-item"><a class="page-link" href="index.php?page='.($page - 1).'">Page precedente</a></li>';
  }

  for($i=1; $i<=$nbPages; $i++){
      if($i==$page)
        $varANourir  .= '<li class="page-item"><a class="page-link">'.$i.'</a></li>';
      else
        $varANourir  .= '<li class="page-item"><a class="page-link" href="index.php?page='.$i.'">'.$i.'</a></li>';
    }
    echo $varANourir;

    if ($page*$limite < $count) {
      echo '<li class="page-item"><a class="page-link" href="index.php?page='.($page + 1).'">Page Suivante</a></li>';
    }
// Necessite bootstrap
}

function testLongueurChamps($arrayErreur, $index, $champs, $lMini, $lMaxi, $required = true){
    if (!empty($champs)) {
      if (strlen($champs) < $lMini) {
         $arrayErreur[$index] = 'Le champ est trop court';
      }
      elseif (strlen($champs) > $lMaxi){
         $arrayErreur[$index] = 'Le champ est trop long';
      }
    }
    else {
      if ($required === true) {
          $arrayErreur[$index] = 'Vous devez renseigner ce champ';
      }
    }
  return $arrayErreur;
}

function validerMail($arrayErreur, $varEmail, $index ){
  if (filter_var($varEmail, FILTER_VALIDATE_EMAIL)) {

  } else {
      $arrayErreur[$index] = 'Email non valide';
  }
  return $arrayErreur;
}

function dateFormat($array, $index){
  $date = strtotime($array[$index]);
  $date = date('d/m/Y à G:i:s');
  return $date;
}

function affichageChampsForm($index){
  if(!empty($_POST[$index])) {
    echo $_POST[$index];
  }
}

function erreursForm($arrayErreur,$index){
  if(!empty($arrayErreur[$index])) {
    echo $arrayErreur[$index];
  }
}
//
// function getElements($table, $bdd, $order = 'id', $limit = 'all'){
//     $sql = "SELECT * FROM $table ORDER BY $order DESC LIMIT $limit"
//     $requete = $bdd->prepare($sql); // prepare requete
//
//     $requete->execute(); // execute requete
//     $elements = $requete->fetchAll();
//     return $elements;
// }
//
// function getElementById($table, $bdd, $id){
//   $sql = "SELECT * FROM $table WHERE id = :id"
//   $requete = $bdd->prepare($sql); // prepare requete
//   $requete->bindValue(':id', $id, PDO::PARAM_INT);
//   $requete->execute(); // execute requete
//   $element = $requete->fetch();
//   return $element;
// }

function affichageElement($a){ ?>
  <div class="test">
    <h2><?php echo $a['title']; ?></h2>
    <p><?php echo $a['auteur']; ?></p>
  </div>
<?php } ?>
