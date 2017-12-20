<?php include "header.php" ?>
<?php include "select.php" ?>

<?php
$result = Select::getVideos();
$result2 = Select::getBlogs();

?>

<?php include "navbar.php" ?>

<div class="row">
    <img src="/pictures/IMG_20170710_143237.jpg" alt="..." class="img-responsive"  style="height: 500px; width:38%">
    <img src="/pictures/BJ 1_edited-01.jpeg" alt="..." class="img-responsive"  style="height: 500px; width:38%">
    <a class="twitter-timeline" data-width="20%" data-height="500px" data-theme="dark" data-chrome="noborders" href="https://twitter.com/truefolktv?ref_src=twsrc%5Etfw">Tweets by truefolktv</a>
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
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
<?php
  }}  else {
    echo "0 results";
  }
?>
</div>
<?php include "footer.php" ?>
