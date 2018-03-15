<?php

include "select.php";

$connection = Select::connect();
$statement = $connection->prepare(
  "DELETE FROM blog WHERE uniqueID=?"
);
$statement->bind_param("i", $_GET["ID"]);
$statement->execute();
header("Location: /controlpanel.php")

?>
