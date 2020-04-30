
<?php
include "dbconfig.php";

$name = $_GET[name]; //$_POST[name];
$id = $_GET[id];

$sql = "INSERT INTO member (id, name) VALUES ('$name','$id')";

$result = mysqli_query($con, $sql);
mysqli_close($con);

echo $result;
?>
