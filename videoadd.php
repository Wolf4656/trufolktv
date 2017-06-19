<?php
session_start();
if (isset($_SESSION["userName"]) == false) {
  header("Location: http://localhost:9001/login.php");
}

include "select.php";

//Set up variables
$title= $_POST ["title"];
$link= $_POST ["link"];
$thumbnail= $_POST ["thumbnail"];
$description= $_POST ["description"];

//Add the video to database
if(Select::addVideo($title, $link, $thumbnail, $description)){
echo "SUCCESS";
header('Location: http://localhost:9001/controlpanel.php');
} else {
  echo "ERROR";
}

?>
