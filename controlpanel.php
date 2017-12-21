<?php
session_start();
global $blogAdd;
$blogAdd = false;
if (isset($_SESSION["userName"]) == false) {
  header("Location: /login.php");
}

if ($blogAdd == true) {
  echo '<div class="alert alert-success" role="alert"> <strong>Success!</strong> Blog added.</div>';
} ?>

<?php include "header.php" ?>
<?php include "navbar.php" ?>
<?php include "select.php" ?>

<h1>Control Panel</h1>

 <div class="form-group">
  <h1> Add New Video </h1>
 <form action="videoadd.php" method="post">
   <div class="form-group">
     <input class="form-control" type="text" name="title" placeholder="Video Title">
   </div>
   <div class="form-group">
     <input class="form-control"  type="text" name="link" placeholder="Youtube Link Address">
   </div>
   <div class="form-group">
     <input class="form-control"  type="text" name="thumbnail" placeholder="Video ID">
   </div>
   <div class="form-group">
     <textarea class="form-control" name="description" type="text" rows="10" cols="70" placeholder="Description"></textarea>
   </div>
   <br><input class="btn btn-primary" type="submit" value="Submit" name="submit">
  </form>
 </div>

<br>

  <div class="form-group">
    <h1>Add Blog Post</h1>
    <form action="blogadd.php" method="post">
      <div class="form-group">
        <input class="form-control" type="text" name="title" placeholder="Post Title">
      </div>
      <div class="form-group">
        <input class="form-control" type="text" name="author" placeholder="Author">
      </div>
      <div class="form-group">
        <input class="form-control" type="text" name="postDate" placeholder="Date">
      </div>
      <div class="form-group">
        <textarea class="form-control" name="blog" type="text" rows="10" cols="70" placeholder="Blog Text Here"></textarea>
      </div>
      <div class="form-group">
        <input class="form-control" type="text" name="tags" placeholder="Tags">
      </div>
      <div class="form-group">
        <input class="form-control" type="text" name="titlePic" placeholder="Title Picture">
      </div>
      <br><input class="btn btn-primary" type="submit" value="Submit" name="submit">
    </form>
  </div>

<br>

  <div class="form-group">
    <h1>Upload Image</h1>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input class="form-control" type="file" name="fileToUpload" id="fileToUpload">
        <br>
        <input class="btn btn-primary" type="submit" value="Upload Image" name="submit">
    </form>
  </div>
<?php include "footer.php" ?>
