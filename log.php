<?php
session_start();
include "select.php";

$userName = $_POST["userName"];
$password = $_POST["password"];
//$password = md5($password);

if (Select::logIn($userName, $password)) {
  $_SESSION["userName"] = $userName;
  header('Location: /controlpanel.php');
} else {
  header('Location: /login.php');
}

?>
