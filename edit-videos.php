<?php
 include "header.php";
 include "navbar.php";
 include "select.php";
 $videos = Select::videoByID($_GET["ID"]);
?>

<h1> Edit Video </h1>

<div class="container">
  <form action="update-videos.php?id=<?php echo $_GET["ID"] ?>" method="post">
    <table class="table">
    <tr>
      <th>
        Title
      </th>
      <th>
        Link
      </th>
      <th>
        Thumbnail
      </th>
      <th>
        Description
      </th>
    </tr>
    <tr>
      <td>
        <input type="text" name="title" value="<?php echo $videos["title"]?>" style="width: 100px;">
      </td>
      <td>
        <input type="text" name="link" value="<?php echo $videos["link"]?>" style="width: 100px;">
      </td>
      <td>
        <input type="text" name="thumbnail" value="<?php echo $videos["thumbnail"]?>" style="width: 100px;">
      </td>
      <td>
        <input type="text" name="description" value="<?php echo $videos["description"]?>" style="width: 100px;">
      </td>
    </tr>
  </table>
    <input type="submit" name="submit" value="Save"></input>
  </form>
</div>

<?php include "footer.php" ?>
