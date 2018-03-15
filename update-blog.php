<?php
include "select.php";
$a = $_POST ["title"];
$b = $_POST ["author"];
$c = $_POST ["postDate"];
$d = $_POST ["blog"];
$e = $_POST ["tags"];
$f = $_POST ["titlePic"];
$i = $_GET ["id"];
$connection = Select::connect();
if(!$statement = $connection->prepare(
  "UPDATE blog SET title=?, author=?, postDate=?, blog=?, tags=?, titlePic=? WHERE uniqueID=?"
)) {
  die("Error = " . $statement->error);
}
if(!$statement->bind_param("ssssssi", $a, $b, $c, $d, $e, $f, $i)){
  die("Error = " . $statement->error);
}
if(!$statement->execute()){
  die("Error = " . $statement->error);
}
header("Location: /controlpanel.php")
?>
