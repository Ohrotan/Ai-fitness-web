<?php

include "dbconfig.php";

$id = $_POST['id'];
$day_id = $_POST['day_id'];

if ($id != null) {
    $results = $db->query("SELECT day_program_video.*, title FROM day_program_video JOIN trainer_video ON day_program_video.video_id = trainer_video.id WHERE id = '$id'");
} else if ($day_id != null) {
    $results = $db->query("SELECT day_program_video.*, title FROM day_program_video JOIN trainer_video ON day_program_video.video_id = trainer_video.id WHERE day_id = '$day_id' ORDER BY seq");
} else {
    $results = $db->query("SELECT day_program_video.*, title FROM day_program_video JOIN trainer_video ON day_program_video.video_id = trainer_video.id");
}

$result_array = array();
if ($results->rowCount() > 0) {
    foreach ($results as $row) {
        array_push($result_array, $row);
    }

}

echo json_encode($result_array);

?>