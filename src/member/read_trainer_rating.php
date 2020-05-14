<?php

include "dbconfig.php";

$name = $_POST[name]; //$_POST[name];
//$id = $_GET[id];

$sql = "select avg_rating from trainer_rating join member where member.id = trainer_rating.trainer_id and name = '$name'";

$stmt = $db->prepare($sql);
$result = $stmt->execute();
echo $result;