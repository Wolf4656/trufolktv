<?php
 include "header.php";
 include "navbar.php";
 include "select.php";
 $blog = Select::blogByID($_GET["ID"]);
?>

<h1> Edit Blog </h1>

<div class="container">
  <form action="update-blog.php?id=<?php echo $_GET["ID"] ?>" method="post">
    <table class="table">
    <tr>
      <th>
        Title
      </th>
      <th>
        Author
      </th>
      <th>
        Date
      </th>
      <th>
        Body
      </th>
      <th>
        Tags
      </th>
      <th>
        Picture
      </th>
    </tr>
    <tr>
      <td>
        <input type="text" name="title" value="<?php echo $blog["title"]?>" style="width: 100px;">
      </td>
      <td>
        <input type="text" name="author" value="<?php echo $blog["author"]?>" style="width: 100px;">
      </td>
      <td>
        <input type="text" name="postDate" value="<?php echo $blog["postDate"]?>" style="width: 100px;">
      </td>
      <td>
        <input type="text" name="blog" value="<?php echo $blog["blog"]?>" style="width: 100px;">
      </td>
      <td>
        <input type="text" name="tags" value="<?php echo $blog["tags"]?>" style="width: 100px;">
      </td>
      <td>
        <input type="text" name="titlePic" value="<?php echo $blog["titlePic"]?>" style="width: 100px;">
      </td>
    </tr>
  </table>
    <input type="submit" name="submit" value="Save"></input>
  </form>
</div>

<?php include "footer.php" ?>
