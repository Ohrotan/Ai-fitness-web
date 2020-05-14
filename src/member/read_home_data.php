<?php

include "dbconfig.php";
include_once "src/paramsCheck.php";

$user_id = (int)$_POST['user_id'];
$trainer = (int)$_POST['trainer'];

$result_array = array();


if ($trainer === 1) { //요청 유저가 트레이너라면 트레이너가 등록한 프로그램 정보를 전송함.
    $results = $db->query("select name, title from trainer as t join exr_program as e on t.id = e.trainer_id where t.id = '$user_id' limit 3");
}
else {//트레이너가 아니라면 신청한 프로그램 정보를 전송함.
    //*****여기 쿼리 부분 수정해야함
    $results = $db->query("select t.name, e.title from member_reg_program m join (trainer t join exr_program e on t.id = e.trainer_id) on e.id = m.exr_id  where m.mem_id = '$user_id' limit 3");
}

array_push($result_array, $results->rowCount());//쿼리 결과 row 개수를 같이 전송함

if ($results->rowCount() > 0)
{
    foreach ($results as $row){
        array_push($result_array,$row);
    }

}


//*****트레이너 목록 추가
$results = $db->query("select id, name, image from trainer limit 4");

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