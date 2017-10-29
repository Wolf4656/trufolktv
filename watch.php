<?php include "header.php" ?>
<?php include "navbar.php" ?>
<?php include "select.php" ?>
<?php $result = Select::getVideos(); ?>
<h1> Watch Our Videos </h1>

<?php
  while($content = mysqli_fetch_assoc($result)) {
?>
  <div class="watch-container">
    <h3><?php echo $content["title"]?></h3>
    <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $content["thumbnail"] ?>" frameborder="0" allowfullscreen ></iframe>
    <p><?php echo $content["description"]?></p>
  </div>
  <hr>
<?php } ?>

<?php include "footer.php" ?>
