<?php
include "dbconfig.php";
include_once "src/paramsCheck.php";

$result_array = array();

$id = $_POST['id'];

array_push($result_array, $id);

echo json_encode($result_array);
?>