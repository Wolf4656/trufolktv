<?php include "header.php" ?>
<?php include "navbar.php" ?>
<?php include "select.php" ?>

<?php
$id = $_GET['id'];
$result = Select::getBlogPost($id);
$content = $result->fetch_assoc();
?>

<div class="container-fluid">
  <img class="blog-title-pic" src="uploads/<?php echo $content["titlePic"] ?>" alt="">

  <div class="blog-body">
    <h1><?php echo $content["title"] ?></h1>
    <h4><?php echo $content["author"] ?></h4>
    <h4><?php echo $content["postDate"] ?></h4>
    <?php
      echo nl2br($content["blog"]);
     ?>
  </div>

  <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/"
  data-layout="button" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore"
  target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">
  Share</a></div>
</div>



<?php include "footer.php" ?>
