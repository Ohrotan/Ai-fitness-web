<?php

include "dbconfig.php";

$name = $_POST[name]; //$_POST[name];
//$id = $_GET[id];

$sql = "DELETE FROM member WHERE name = '$name'";

$stmt = $db->prepare($sql);
$result = $stmt->execute();
echo $result;