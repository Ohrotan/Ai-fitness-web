<?php

include "dbconfig.php";

$id = $_POST[id];
//$name = $_POST[name];
$height = $_POST[height];
$weight = $_POST[weight];
$muscle = $_POST[muscle];
$fat = $_POST[fat];
$intro = $_POST[intro];
$trainer = $_POST[trainer];
$image = $_POST[image];//$_POST[name];
//$id = $_GET[id];

$sql = "UPDATE member SET height = '$height', weight = '$weight', muscle = '$muscle', fat = '$fat', intro = '$intro', trainer = '$trainer', image = '$image' WHERE id = '$id'";

$stmt = $db->prepare($sql);
$result = $stmt->execute();
echo $result;