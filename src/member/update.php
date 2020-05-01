
<?php

include "dbconfig.php";

$name = $_GET[name]; //$_POST[name];
$id = $_GET[id];
$intro = $_GET[intro]; // $_POST[intro];

$sql = "UPDATE member SET intro = '$intro' WHERE id = '$id'";
$stmt = $db->prepare($sql);
$result = $stmt->execute();
echo $result;

?>
