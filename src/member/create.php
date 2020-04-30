
<?php
include "dbconfig.php";

$name = $_POST[name]; //$_POST[name];
$id = $_POST[id];

$sql = "INSERT INTO member (id, name) VALUES ('$id','$name')";

$result = mysqli_query($con, $sql);
mysqli_close($con);

echo $result;
?>
