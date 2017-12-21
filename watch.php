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
    <div class="embed-responsive embed-responsive-16by9">
      <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $content["thumbnail"] ?>" frameborder="0" allowfullscreen></iframe>
    </div>
    <p><?php echo $content["description"]?></p>
  </div>
  <hr>
<?php } ?>

<?php include "footer.php" ?>
