<?php

include "select.php";

$connection = Select::connect();
$statement = $connection->prepare(
  "DELETE FROM videos WHERE ID=?"
);
$statement->bind_param("i", $_GET["ID"]);
$statement->execute();
header("Location: /controlpanel.php")

?>
