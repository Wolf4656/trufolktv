<?php include "header.php" ?>
<?php include "select.php" ?>
<?php $result = Select::getVideos(); ?>
<?php include "navbar.php" ?>

<hr>

  <div class="row">
    <div class="image1"><img src="/pictures/AZ 2_edited-01.jpeg" alt="..." class="img-responsive"></div>
    <div class="twitter-timeline">
      <a class="twitter-timeline" data-width="25%" data-height="523px" data-theme="dark" href="https://twitter.com/truefolktv">
      Tweets by TrueFolkTV</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
    </div>
  </div>

<hr>

<h3> Latest Episodes </h3>
<div class="episode-row">
<?php
if($result->num_rows > 0) {
  //output data for the latest 3 videos
  for($row = mysqli_num_rows($result); ($row>(mysqli_num_rows($result)-3)) && ($row>0);$row--) {
    $content = $result->fetch_assoc()
    ?>
  <div class="episode-container">
      <a href="<?php echo $content["link"]?>"><img src ="https://img.youtube.com/vi/<?php echo $content["thumbnail"]?>/hqdefault.jpg"></a>
    <p><?php echo $content["title"]?></p>
  </div>
<?
  }}  else {
    echo "0 results";
  }
?>
</div>
<hr>

<div class="container-new">
  <div class="image2">
    <img src="/pictures/PF 7_edited-01.jpeg" alt="">
  </div>
    <p class="abouttext">
      True Folk TV is a project dedicated to promoting community as well as giving
      emerging artists a platform to promote their work while actively shaping and contributing to culture.
    </p>
</div>

<?php include "footer.php" ?>
