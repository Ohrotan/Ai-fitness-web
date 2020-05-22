<?php
include "dbconfig.php";

$mem_id = $_POST['mem_id'];
$exr_id = $_POST['exr_id'];
$rating = $_POST['rating'];
$period = $_POST['period'];

$sql = "insert into member_reg_program(mem_id, exr_id, start_date, end_date, rating, reg_date) values('$mem_id', '$exr_id', now(), date_add(now(),INTERVAL '$period' DAY), '$rating', CURRENT_TIMESTAMP)";
//$sql = "insert into member_reg_program(mem_id, exr_id, start_date, end_date, rating, reg_date) values(3, 4, now(), date_add(now(),INTERVAL 30 DAY), 0, CURRENT_TIMESTAMP)";
$stmt = $db->prepare($sql);
$result = $stmt->execute();


echo $result;
?>