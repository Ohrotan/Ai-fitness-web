<?php

include "dbconfig.php";

$id = $_POST['id'];
$day_id = $_POST['day_id'];

if ($id != null) {
    $results = $db->query("SELECT day_program_video.*, title FROM day_program_video JOIN trainer_video WHERE id = '$id'");
} else if ($day_id != null) {
    $results = $db->query("SELECT day_program_video.*, title FROM day_program_video JOIN trainer_video WHERE day_id = '$day_id' ORDER BY seq");
} else {
    $results = $db->query("SELECT day_program_video.*, title FROM day_program_video JOIN trainer_video");
}

$result_array = array();
if ($results->rowCount() > 0) {
    foreach ($results as $row) {
        array_push($result_array, $row);
    }

}

echo json_encode($result_array);

?>