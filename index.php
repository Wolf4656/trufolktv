<?php include "header.php" ?>
<?php include "select.php" ?>
<?php $result = Select::getVideos(); ?>
<?php include "navbar.php" ?>

<hr>

  <div class="row">
    <img src="image1.jpg" alt="" style="margin-left: 50px;">
    <a class="twitter-timeline" data-width="300" data-height="530" data-theme="dark" href="https://twitter.com/truefolktv">
    Tweets by JishWolfson</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
  </div>

<hr>

<h3> Latest Episodes </h3>
<div class="episode-row">
<?php
if($result->num_rows > 0) {
  //output data for the latest 3 videos
  for($row = mysqli_num_rows($result); $row>(mysqli_num_rows($result)-3);$row--) {
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

<h3> What is Trufolk TV? </h3>
  <div class="container-new">
    <img src="image2.jpg" alt="" style="float:right;">
    <p style="padding-right:20px">
      TEXT ABOUT WHAT TRUEFOLK TV IS TEXT ABOUT WHAT TRUEFOLK TV IS TEXT ABOUT WHAT TRUEFOLK TV IS
      TEXT ABOUT WHAT TRUEFOLK TV IS TEXT ABOUT WHAT TRUEFOLK TV IS TEXT ABOUT WHAT TRUEFOLK TV IS
      TEXT ABOUT WHAT TRUEFOLK TV IS TEXT ABOUT WHAT TRUEFOLK TV IS TEXT ABOUT WHAT TRUEFOLK TV IS
      TEXT ABOUT WHAT TRUEFOLK TV IS TEXT ABOUT WHAT TRUEFOLK TV IS TEXT ABOUT WHAT TRUEFOLK TV IS
      TEXT ABOUT WHAT TRUEFOLK TV IS TEXT ABOUT WHAT TRUEFOLK TV IS TEXT ABOUT WHAT TRUEFOLK TV IS
      TEXT ABOUT WHAT TRUEFOLK TV IS TEXT ABOUT WHAT TRUEFOLK TV IS TEXT ABOUT WHAT TRUEFOLK TV IS
      TEXT ABOUT WHAT TRUEFOLK TV IS TEXT ABOUT WHAT TRUEFOLK TV IS TEXT ABOUT WHAT TRUEFOLK TV IS
      TEXT ABOUT WHAT TRUEFOLK TV IS TEXT ABOUT WHAT TRUEFOLK TV IS TEXT ABOUT WHAT TRUEFOLK TV IS
      TEXT ABOUT WHAT TRUEFOLK TV IS TEXT ABOUT WHAT TRUEFOLK TV IS TEXT ABOUT WHAT TRUEFOLK TV IS
      TEXT ABOUT WHAT TRUEFOLK TV IS TEXT ABOUT WHAT TRUEFOLK TV IS TEXT ABOUT WHAT TRUEFOLK TV IS
      TEXT ABOUT WHAT TRUEFOLK TV IS TEXT ABOUT WHAT TRUEFOLK TV IS TEXT ABOUT WHAT TRUEFOLK TV IS
      TEXT ABOUT WHAT TRUEFOLK TV IS TEXT ABOUT WHAT TRUEFOLK TV IS TEXT ABOUT WHAT TRUEFOLK TV IS
      TEXT ABOUT WHAT TRUEFOLK TV IS TEXT ABOUT WHAT TRUEFOLK TV IS TEXT ABOUT WHAT TRUEFOLK TV IS
    </p>
  </div>

<?php include "footer.php" ?>
