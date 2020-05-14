<?php
include "dbconfig.php";

$uid = (int)$_POST('uid');
$day_program_id = (int)$_POST['day_program_id'];

$result_array = array();

//day_program의 intro, title 얻기
$results = $db->query("select intro, title from day_program where id = '$day_program_id'");
array_push($result_array, $results->rowCount());
if ($results->rowCount() > 0) {
    foreach ($results as $row) {
        array_push($result_array, $row);
    }

    $results = $db->query("select dpv.counts, dpv.sets, meh.thumb_img, meh.video, tv.title, meh.feedback, meh.time, meh.date from member_exr_history meh join day_program dp on meh.day_id = dp.id join day_program_video dpv on meh.day_program_video_id = dpv.id join trainer_video tv on dpv.video_id = tv.id where meh.mem_id = '$uid' and meh.day_id = '$day_program_id' order by dpv.seq");
    array_push($result_array, $results->rowCount());
    if ($results->rowCount() > 0) {
        foreach ($results as $row) {
            array_push($result_array, $row);
        }
    }
}

echo json_encode($result_array);
?>