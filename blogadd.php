<?php
session_start();
if (isset($_SESSION["userName"]) == false) {
  header("Location: http://localhost:9001/login.php");
}

include "select.php";

//Set up variables
$title = $_POST ["title"];
$author = $_POST ["author"];
$postDate = $_POST ["postDate"];
$blog = $_POST ["blog"];
$tags = $_POST ["tags"];
$titlepic = $_POST["titlePic"];

//Add blog post to database
if (Select::addBlogPost($title, $author, $postDate, $blog, $tags, $titlepic)) {
  echo "SUCCESS!";
  $blogAdd = true;
  header('Location: /controlpanel.php');
} else {
  echo "ERROR";
}

?>
