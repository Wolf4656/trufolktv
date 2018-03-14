<?php include "header.php" ?>
<?php include "navbar.php" ?>
<?php include "select.php" ?>

<?php $result = Select::getVideos(); ?>

<h1> Watch Our Videos </h1>

<?php
  for ($i=0; $i < mysqli_num_rows($result) ; $i++) {
    $content = $result->fetch_assoc();
    if ($i == 0) {
      ?>
      <div class="watch-container">
        <h3><?php echo $content["title"]?></h3>
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $content["thumbnail"] ?>" frameborder="0" allowfullscreen></iframe>
        </div>
      </div>
      <br>
      <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselIndicators" data-slide-to="1"></li>
          <li data-target="#carouselIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
        <div class="carousel-item active">
    <?php }
    while ($i < 4) { $content = $result->fetch_assoc();?>

      <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $content["thumbnail"] ?>" frameborder="0" allowfullscreen></iframe>
  <?php $i++; } ?>
</div><div class="carousel-item">
  <?php $c = $i+4;
  while ($i < $c) { $content = $result->fetch_assoc();?>
    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $content["thumbnail"] ?>" frameborder="0" allowfullscreen></iframe>
  <?php $i++; } ?>
  </div>
<?php } ?>
</div>
  <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


  <hr>

<?php include "footer.php" ?>
