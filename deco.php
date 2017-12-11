<?php
session_destroy();
setcookie('reconnect', '', time() -3600, '/', 'localhost', false, true);
header('Location:connection.php');
