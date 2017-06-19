<?php include "header.php" ?>
<?php include "select.php" ?>
<?php $result = Select::getVideos(); ?>

  <div class="logo">
    <h1> True Folk TV </h1>
  </div>

<?php include "navbar.php" ?>

<hr>

<div class="row">
  <img src="image1.jpg" alt="">
  <a class="twitter-timeline" data-width="300" data-height="530" href="https://twitter.com/JishWolfson">Tweets by JishWolfson</a>
  <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
  <!--
  <h3> Schedule </h3>
  <div class="schedule">
    <p>Monday</p>
  </div>
  <div class="schedule">
    <p>Tuesday</p>
  </div>
  <div class="schedule">
    <p>Wednesday</p>
  </div>
  <div class="schedule">
    <p>Thursday</p>
  </div>
  <div class="schedule">
    <p>Friday</p>
  </div>
  <div class="schedule">
    <p>Saturday</p>
  </div>
  <div class="schedule">
    <p>Sunday</p>
  </div>
  <div class="schedule">
    <p>Questions?<a href="contact.php"> Contact us</a></p>
  </div>
    -->
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
    <img src="image2.jpg" alt="" style="float: right;">
    <p style="margin-right: 15px;">
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
