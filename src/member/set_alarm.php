<?php

include "dbconfig.php";

$name = $_POST[name];
$alarm = $_POST[alarm];//$_POST[name];
//$id = $_GET[id];

$sql = "UPDATE member SET alarm = '$alarm' WHERE name = '$name'";

$stmt = $db->prepare($sql);
$result = $stmt->execute();
echo $result;