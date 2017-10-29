<?php include "header.php" ?>
<?php include "select.php" ?>
<?php include "navbar.php" ?>

<?php
$result = Select::getVideos();
$result2 = Select::getBlogs();
?>


<div class="row">
    <img src="/pictures/IMG_20170710_143237.jpg" alt="..." class="img-responsive"  style="height: 500px;">
    <a class="twitter-timeline" data-width="20%" data-height="500px" data-theme="dark" data-chrome="noborders" href="https://twitter.com/truefolktv?ref_src=twsrc%5Etfw">Tweets by truefolktv</a>
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    <div class="recent-blog">
      <h1>Recent Blog Posts</h1>
        <?php
         for($i = mysqli_num_rows($result2)-4; $i < mysqli_num_rows($result2); $i++){
           $content2 = $result2->fetch_assoc();
           if ($i == mysqli_num_rows($result2)-4) { ?>
             <div class="blog-feature">
               <a href="item.php?id=<?php echo $content2["uniqueID"] ?>"><img class="blog-block" src="uploads/<?php echo $content2["titlePic"] ?>" alt=""><p><?php echo $content2["title"]; ?></p></a>
             </div>
           <?php } else { ?>


        <div class="blog-container">
          <a href="item.php?id=<?php echo $content2["uniqueID"] ?>"><img class="blog-block" src="uploads/<?php echo $content2["titlePic"] ?>" alt=""><p><?php echo $content2["title"]; ?></p></a>
        </div>

      <?php }} ?>

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
<?php
  }}  else {
    echo "0 results";
  }
?>
</div>
<hr>

<div class="container-new">
  <div class="image2">
    <img src="/pictures/OFN 5_edited-01.jpeg" alt="">
  </div>
    <p class="abouttext">
      True Folk TV is a project dedicated to promoting community as well as giving
      emerging artists a platform to promote their work while actively shaping and contributing to culture.
    </p>
</div>
<?php include "footer.php" ?>
