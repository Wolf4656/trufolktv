<?php include "header.php" ?>
<?php include "navbar.php" ?>

<?php include "select.php"; $searchblogs = Select::searchBlogs($_GET["query"]); ?>

<h1>Results</h1>

<?php
  $i = 0;
  $rows = mysqli_num_rows($searchblogs) + 1;
  while($i < $rows)  {
    $content2 = $searchblogs->fetch_assoc();
?>
  <div class="blog-feature">
    <a href="item.php?id=<?php echo $content2["uniqueID"] ?>"><img class="blog-block" src="uploads/<?php echo $content2["titlePic"] ?>" alt=""><p><?php echo $content2["title"]; ?></p></a>
  </div>
<?php
$i = $i+1;
 }
?>

<?php include "footer.php" ?>
