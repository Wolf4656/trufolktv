<?php include "header.php" ?>
<?php include "navbar.php" ?>
<?php include "select.php" ?>

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

<?php include "footer.php" ?>
