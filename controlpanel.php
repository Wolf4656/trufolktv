<?php
session_start();
if (isset($_SESSION["userName"]) == false) {
  header("Location: http://localhost:9001/login.php");
}
?>
<?php include "header.php" ?>
<?php include "navbar.php" ?>
<?php include "select.php" ?>
<?php //$result = Select::smashers(); ?>

<h1>Control Panel</h1>

<div class="control-panel">
<h1> Add New Video </h1>
 <div class="login-form">
 <form action="videoadd.php" method="post">
   <div class="form-group">
     <input class="input-box" type="text" name="title" placeholder="Video Title">
   </div>
   <div class="form-group">
     <input class="input-box"  type="text" name="link" placeholder="Youtube Link Address">
   </div>
   <div class="form-group">
     <input class="input-box"  type="text" name="thumbnail" placeholder="Video ID">
   </div>
   <div class="form-group">
     <p>Description</p>
     <textarea name="description" type="text" rows="10" cols="70"></textarea>
   </div>
   <br><input type="submit" value="Submit" name="submit">
  </form>
 </div>
 <br>
 <a href="adminvideos.php">Edit Videos</a>
</div>

<?php include "footer.php" ?>
