<?php
include('inc/pdo.php');
session_start();
if (!empty($_COOKIE['reconnect']) && !isset($_SESSION['reconnect'])) {
  // debug($_COOKIE);
  // echo 'salut';
  $auth = $_COOKIE['reconnect'];
  $auth = explode('----', $auth);
  $id = $auth[0];
  $sql = "SELECT * FROM users WHERE id = :id";
  $query = $pdo->prepare($sql);
  $query->bindValue(':id',$id, PDO::PARAM_STR);
  $query->execute();
  $user = $query->fetch();

  $key = sha1($user['pseudo'] . $user['pass'] . $_SERVER['REMOTE_ADDR']);
  if ($key == $auth[1]) {
    $_SESSION['user']['id'] = $user['id'];
    $_SESSION['user']['role']= $user['role'];
    $_SESSION['user']['pseudo'] = $user['pseudo'];
    // $_SESSION['user']['email'] = $user['email'];
    $_SESSION['user']['ip'] = $_SERVER['REMOTE_ADDR'];
    debug($_SESSION);
    setcookie('reconnect', $user['id'] . '----' . sha1($key), time() + 3600 + 24 * 3, '/', 'localhost', false, true);
  } else {
    setcookie('reconnect','',  time() -3600,'/', 'localhost', false, true);
  }
}
