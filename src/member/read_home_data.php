<?php

include "dbconfig.php";
include_once "src/paramsCheck.php";

$user_id = (int)$_POST['user_id'];
$trainer = (int)$_POST['trainer'];

$result_array = array();


if ($trainer === 1) { //요청 유저가 트레이너라면 트레이너가 등록한 프로그램 중에서 피드백 대기중인 정보를 전송함.
    $results = $db->query("select meh.exr_id as id, (select name from member where id = ep.trainer_id) as name, ep.title
from member_exr_history meh join member m on meh.mem_id = m.id join exr_program ep on meh.exr_id = ep.id join day_program dp on meh.day_id = dp.id
where ep.trainer_id = '$user_id' and meh.feedback is NULL
limit 3");
}
else {//트레이너가 아니라면 신청한 프로그램 정보를 전송함.
    $results = $db->query("select e.id, t.name, e.title from member_reg_program m join (trainer t join exr_program e on t.id = e.trainer_id) on e.id = m.exr_id  where m.mem_id = '$user_id' limit 3");
}

array_push($result_array, $results->rowCount());//쿼리 결과 row 개수를 같이 전송함

if ($results->rowCount() > 0)
{
    foreach ($results as $row){
        array_push($result_array,$row);
    }

}


//*****트레이너 목록 추가
$results = $db->query("SELECT id, name, height, weight, muscle, fat, gender, birth, intro, image, avg_rating, ifnull((select memberNum from trainer_member_num TM join member M where TM.trainer_id = M.id and id = MM.id), 0) as memberNum FROM trainer_rating tr join member MM ON tr.trainer_id = MM.id WHERE trainer = 1 limit 4");

array_push($result_array, $results->rowCount());//쿼리 결과 row 개수를 같이 전송함

if ($results->rowCount() > 0)
{
    foreach ($results as $row){
        array_push($result_array,$row);
    }

}

//*****전체 운동 프로그램 추가
$results = $db->query("select e.id as id, name, title from trainer as t join exr_program as e on t.id = e.trainer_id limit 3");

array_push($result_array, $results->rowCount());//쿼리 결과 row 개수를 같이 전송함

if ($results->rowCount() > 0)
{
    foreach ($results as $row){
        array_push($result_array,$row);
    }
}


echo json_encode($result_array);
?>