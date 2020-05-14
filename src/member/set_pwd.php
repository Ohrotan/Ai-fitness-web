<?php

include "dbconfig.php";

$name = $_POST[name];
$pwd = $_POST[pwd];//$_POST[name];
//$id = $_GET[id];

$sql = "UPDATE member SET pwd = '$pwd' WHERE name = '$name'";

$stmt = $db->prepare($sql);
$result = $stmt->execute();
echo $result;