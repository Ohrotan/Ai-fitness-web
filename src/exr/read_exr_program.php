<?php

include "dbconfig.php";

$id = $_POST['id'];

$results = $db->query("SELECT * from exr_program where id = '$id'");
$result_array = array();
if ($results->rowCount() > 0) {
    foreach ($results as $row) {
        array_push($result_array, $row);
    }

}

echo json_encode($result_array);

?>