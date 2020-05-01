
<?php

include "dbconfig.php";

$name = $_GET[name]; //$_POST[name];
$id = $_GET[id];

$sql = "DELETE FROM member WHERE id = '$id'";

$stmt = $db->prepare($sql);
$result = $stmt->execute();
echo $result;

?>
