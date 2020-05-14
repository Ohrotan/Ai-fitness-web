<?php

$day_program_id = $_POST['day_program_id'];

$result_array = array();

//day_program의 intro, title 얻기
$results = $db->query("select intro, title from day_program where id = '$day_program_id'");
array_push($result_array, $results->rowCount());
if ($results->rowCount() > 0) {
    foreach ($results as $row) {
        array_push($result_array, $row);
    }

    $results = $db->query("select counts, sets, thumb_img, video, title from day_program_video dpv join trainer_video tv on dpv.video_id = tv.id where day_id = '$day_program_id' order by seq");
    array_push($result_array, $results->rowCount());
    if ($results->rowCount() > 0) {
        foreach ($results as $row) {
            array_push($result_array, $row);
        }
    }
}

echo json_encode($result_array);