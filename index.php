<?php include "header.php" ?>
<?php include "select.php" ?>

<?php
$result = Select::getVideos();
$result2 = Select::getBlogs();

?>

<?php include "navbar.php" ?>

<div class="sidebar">
  <a class="twitter-timeline" data-align="right" data-width="100%" data-height="450" data-theme="dark" data-chrome="noborders" href="https://twitter.com/truefolktv?ref_src=twsrc%5Etfw">Tweets by truefolktv</a>
  <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
</div>

<div class="row">
<?php
if($result2->num_rows > 0) {
  for($row = mysqli_num_rows($result2); ($row>(mysqli_num_rows($result2)-3)) && ($row>0);$row--) {
    $content2 = $result2->fetch_assoc()
?>
  <div class="blog-container">
    <a href="item.php?id=<?php echo $content2["uniqueID"] ?>">
      <?php if ($content2["titlePic"] == FALSE) {?>
      <img class="blog-block" src="uploads/No_image_3x4.png">
    <?php } else { ?>
      <img class="blog-block" src="uploads/<?php echo $content2["titlePic"] ?>" alt="">
    <?php } ?>
      <p><?php echo $content2["title"]; ?></p></a>
      <p><?php echo $content2["postDate"]; ?></p>
      <p><?php echo substr($content2["blog"], 0, 300)?></p>
      <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Share</a></div>
      <button type="button" class="btn btn-secondary btn-sm"><a href="item.php?id=<?php echo $content2["uniqueID"] ?>">Read More</a></button>
  </div><br>
<?php
  }}  else {
    echo "0 results";
  }
?>
</div>

<hr>
<br><br><br><br>
<br><br><br><br>
<br><br><br><br>
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
<?php
  }}  else {
    echo "0 results";
  }
?>
</div>
<?php include "footer.php" ?>
