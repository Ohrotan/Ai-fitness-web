<?php

include "dbconfig.php";

$id = $_POST['id'];
$exr_id = $_POST['exr_id'];

if ($id != null) {
    $results = $db->query("SELECT * FROM day_program WHERE id = '$id'");
} else if ($exr_id != null) {
    $results = $db->query("SELECT * FROM day_program WHERE exr_id = '$exr_id' ORDER BY seq");
} else {
    $results = $db->query("SELECT * FROM day_program");
}

$result_array = array();
if ($results->rowCount() > 0) {
    foreach ($results as $row) {
        array_push($result_array, $row);
    }

}

echo json_encode($result_array);

?>