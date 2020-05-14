<?php

include "dbconfig.php";

$id = $_POST['id'];
$trainer_id = $_POST['trainer_id'];

if ($id != null) {
    $results = $db->query("SELECT * FROM exr_program WHERE id = '$id'");
} else if ($trainer_id != null) {
    $results = $db->query("SELECT * FROM exr_program WHERE trainer_id = '$trainer_id'");
} else {
    $results = $db->query("SELECT * FROM exr_program");
}

$result_array = array();
if ($results->rowCount() > 0) {
    foreach ($results as $row) {
        array_push($result_array, $row);
    }

}

echo json_encode($result_array);

?>