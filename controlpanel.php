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

<?php $result = Select::getBlogs(); ?>
<?php $result2 = Select::getVideos(); ?>

<h1>Control Panel</h1>

<table class="table">
  <h2>Blogs</h2>
  <thead>
    <tr>
      <th scope="col">ID</td>
      <th scope="col">Title</td>
      <th scope="col">Author</td>
      <th scope="col">Date</td>
      <th scope="col">Body</td>
      <th scope="col">Tags</td>
      <th scope="col">Title Picture</td>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php
    if($result->num_rows > 0) {
      //output data for all videos
      for($row = mysqli_num_rows($result); $row > 0; $row--){
        $content = $result->fetch_assoc()
        ?>
        <tr>
          <th scope="row"><?php echo $content["uniqueID"]?></th>
          <td><?php echo $content["title"]?></td>
          <td><?php echo $content["author"]?></td>
          <td><?php echo $content["postDate"]?></td>
          <td><?php echo $content["blog"]?></td>
          <td><?php echo $content["tags"]?></td>
          <td><?php echo $content["titlePic"]?></td>
          <td>
            <form method="post" action="edit.php?ID=<?php echo $content["uniqueID"] ?>">
              <input type="submit" class="btn btn-warning" name="submit" value="Edit">
            </form>
          </td>
          <td>
            <form method="post" action="delete.php?ID=<?php echo $content["uniqueID"] ?>">
              <input type="submit" class="btn btn-danger" name="submit" value="Delete">
            </form>
          </td>
        <?php
      }}  else {
            echo "0 results";
          }
        ?>
  </tbody>
  <tfoot>
  </tfoot>
</table>
<button type="button" class="btn btn-success"><a href="controlpanel-blogadd.php">Add Blog</a></button>

<table class="table">
  <h2>Videos</h2>
  <thead>
    <tr>
      <th scope="col">ID</td>
      <th scope="col">Title</td>
      <th scope="col">Link</td>
      <th scope="col">Thumbnail</td>
      <th scope="col">Description</td>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php
    if($result2->num_rows > 0) {
      //output data for all videos
      for($row = mysqli_num_rows($result2); $row > 0; $row--){
        $content2 = $result2->fetch_assoc()
        ?>
        <tr>
          <th scope="row"><?php echo $content2["ID"]?></th>
          <td><?php echo $content2["title"]?></td>
          <td><?php echo $content2["link"]?></td>
          <td><?php echo $content2["thumbnail"]?></td>
          <td><?php echo $content2["description"]?></td>
          <td>
            <form method="post" action="edit-videos.php?ID=<?php echo $content2["ID"] ?>">
              <input type="submit" class="btn btn-warning" name="submit" value="Edit">
            </form>
          </td>
          <td>
            <form method="post" action="delete-videos.php?ID=<?php echo $content2["ID"] ?>">
              <input type="submit" class="btn btn-danger" name="submit" value="Delete">
            </form>
          </td>
        <?php
      }}  else {
            echo "0 results";
          }
        ?>
  </tbody>
  <tfoot>
  </tfoot>
</table>
<button type="button" class="btn btn-success"><a href="controlpanel-videoadd.php">Add Blog</a></button>

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
