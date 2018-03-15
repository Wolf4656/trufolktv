<?php
include "select.php";
$a = $_POST ["title"];
$b = $_POST ["link"];
$c = $_POST ["thumbnail"];
$d = $_POST ["description"];
$i = $_GET ["id"];
$connection = Select::connect();
if(!$statement = $connection->prepare(
  "UPDATE videos SET title=?, link=?, thumbnail=?, description=?  WHERE ID=?"
)) {
  die("Error = " . $statement->error);
}
if(!$statement->bind_param("ssssi", $a, $b, $c, $d, $i)){
  die("Error = " . $statement->error);
}
if(!$statement->execute()){
  die("Error = " . $statement->error);
}
header("Location: /controlpanel.php")
?>
