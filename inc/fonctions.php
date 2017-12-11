<?php

function debug($tableau){
  echo '<pre>';
    print_r($tableau);
  echo '</pre>';
}

// function pagination($page,$limite,$count, $varANourir, $nbPages, $page){
//   if ($page != 1) {
//     echo'<li class="page-item"><a class="page-link" href="index.php?page='.($page - 1).'">Page precedente</a></li>';
//   }
//
//   for($i=1; $i<=$nbPages; $i++){
//       if($i==$page)
//         $varANourir  .= '<li class="page-item"><a class="page-link">'.$i.'</a></li>';
//       else
//         $varANourir  .= '<li class="page-item"><a class="page-link" href="index.php?page='.$i.'">'.$i.'</a></li>';
//     }
//     echo $varANourir;
//
//     if ($page*$limite < $count) {
//       echo '<li class="page-item"><a class="page-link" href="index.php?page='.($page + 1).'">Page Suivante</a></li>';
//     }
// // Necessite bootstrap
// }

function isLogged(){
  if (!empty($_SESSION['user'])) {
    if (!empty($_SESSION['user']['pseudo']) && !empty($_SESSION['user']['id']) && is_numeric($_SESSION['user']['id']) && !empty($_SESSION['user']['role']) && $_SESSION['user']['ip'] === $_SERVER['REMOTE_ADDR']) {
      return true;
    }
  }
  return false;
}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

// function remove_accent($str) {
//   $a = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð',
//   'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã',
//   'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ',
//   'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'Ā', 'ā', 'Ă', 'ă', 'Ą', 'ą', 'Ć', 'ć', 'Ĉ',
//   'ĉ', 'Ċ', 'ċ', 'Č', 'č', 'Ď', 'ď', 'Đ', 'đ', 'Ē', 'ē', 'Ĕ', 'ĕ', 'Ė', 'ė', 'Ę', 'ę',
//   'Ě', 'ě', 'Ĝ', 'ĝ', 'Ğ', 'ğ', 'Ġ', 'ġ', 'Ģ', 'ģ', 'Ĥ', 'ĥ', 'Ħ', 'ħ', 'Ĩ', 'ĩ', 'Ī', 'ī',
//   'Ĭ', 'ĭ', 'Į', 'į', 'İ', 'ı', 'Ĳ', 'ĳ', 'Ĵ', 'ĵ', 'Ķ', 'ķ', 'Ĺ', 'ĺ', 'Ļ', 'ļ', 'Ľ', 'ľ',
//   'Ŀ', 'ŀ', 'Ł', 'ł', 'Ń', 'ń', 'Ņ', 'ņ', 'Ň', 'ň', 'ŉ', 'Ō', 'ō', 'Ŏ', 'ŏ', 'Ő', 'ő', 'Œ',
//   'œ', 'Ŕ', 'ŕ', 'Ŗ', 'ŗ', 'Ř', 'ř', 'Ś', 'ś', 'Ŝ', 'ŝ', 'Ş', 'ş', 'Š', 'š', 'Ţ', 'ţ', 'Ť',
//   'ť', 'Ŧ', 'ŧ', 'Ũ', 'ũ', 'Ū', 'ū', 'Ŭ', 'ŭ', 'Ů', 'ů', 'Ű', 'ű', 'Ų', 'ų', 'Ŵ', 'ŵ', 'Ŷ',
//   'ŷ', 'Ÿ', 'Ź', 'ź', 'Ż', 'ż', 'Ž', 'ž', 'ſ', 'ƒ', 'Ơ', 'ơ', 'Ư', 'ư', 'Ǎ', 'ǎ', 'Ǐ', 'ǐ',
//   'Ǒ', 'ǒ', 'Ǔ', 'ǔ', 'Ǖ', 'ǖ', 'Ǘ', 'ǘ', 'Ǚ', 'ǚ', 'Ǜ', 'ǜ', 'Ǻ', 'ǻ', 'Ǽ', 'ǽ', 'Ǿ', 'ǿ');
//
//   $b = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O',
//   'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c',
//   'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u',
//   'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D',
//   'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g',
//   'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K',
//   'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o',
//   'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S',
//   's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W',
//   'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i',
//   'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o');
//   return str_replace($a, $b, $str);
// }
//
//
// // fonction pour générer le slug à partir du titre d'un film
// // Paramètre : $str => chaîne de caractère
// // Retourne une chaîne de caractère de type khfgf-lifljhf-ehfdkh
// function slug($str){
//   $slug = strtolower(remove_accent($str));
//   return $slug;
// }
//
// // fonction de généreration d'un slug à partir d'une chaîne de caractères
// // Paramètre : $str => chaîne de caractère
// // Retourne une chaîne de caractère de type khfgf-lifljhf-ehfdkh avec les accents
// function generate_slug($str) {
// 	$slug = strtolower($str);
//
// 	$slug = preg_replace("/[^a-z0-9s-]/", "", $slug);
// 	$slug = trim(preg_replace("/[s-]+/", " ", $slug));
// 	$slug = preg_replace("/s/", "-", $slug);
//
// 	return $slug;
// }

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
//
