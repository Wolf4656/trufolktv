<?php include "header.php" ?>
<?php include "navbar.php" ?>
<?php include "select.php" ?>

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

<?php include "footer.php" ?>
