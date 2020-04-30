
<?php

include "dbconfig.php";

$name = $_GET[name]; //$_POST[name];
$id = $_GET[id];

$sql = "DELETE FROM member WHERE id = '$id'";

$result = mysqli_query($con, $sql);
echo $result;

// Close connections
mysqli_close($con);

?>
