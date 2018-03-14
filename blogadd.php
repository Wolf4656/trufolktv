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
$titlePic = $_POST["titlePic"];

//Add blog post to database
if (isset($_POST['preview'])) {
   include "header.php";
   header("X-XSS-Protection: 0");
   include "navbar.php";
?>

   <div class="container-fluid">
     <img class="blog-title-pic" src="uploads/<?php echo $titlePic ?>" alt="">

     <div class="blog-body">
       <h1><?php echo $title ?></h1>
       <h4><?php echo $author ?></h4>
       <h4><?php echo $postDate ?></h4>
       <?php
         echo nl2br($blog);
        ?>
     </div>

     <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/"
     data-layout="button" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore"
     target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">
     Share</a></div>
     <?php

   include "footer.php";

} elseif (isset($_POST['submit'])) {
    if (Select::addBlogPost($title, $author, $postDate, $blog, $tags, $titlePic)) {
      echo "SUCCESS!"; ?>
      <a href="/controlpanel.php">Go Back!v</a>
      <?php
}} else {
  echo "ERROR";
}

?>
