<?php include "header.php" ?>
<?php include "navbar.php" ?>
<?php include "select.php" ?>

<?php $result = Select::getBlogs(); ?>

<h3>Blog</h3>
<div class="container-fluid">
<?php
 for($i = 0; $i < mysqli_num_rows($result); $i++){
   $content = $result->fetch_assoc();
   if ($i == 0) { ?>
     <div class="blog-feature">
       <a href="item.php?id=<?php echo $content["uniqueID"] ?>"><img class="blog-block" src="uploads/<?php echo $content["titlePic"] ?>" alt=""><p><?php echo $content["title"]; ?></p></a>
     </div>
   <?php } else { ?>

  <div class="blog-container">
    <a href="item.php?id=<?php echo $content["uniqueID"] ?>"><img class="blog-block" src="uploads/<?php echo $content["titlePic"] ?>" alt=""><h1><?php echo $content["title"]; ?></h1></a>
  </div>

<?php }} ?>
</div>

<?php include "footer.php" ?>
