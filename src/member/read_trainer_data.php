<?php

include "dbconfig.php";

$name = $_POST[name];
//$height = $_POST[height];
//$weight = $_POST[weight];
//$muscle = $_POST[muscle];
//$fat = $_POST[fat];
//$gender = $_POST[gender];
//$birth = $_POST[birth];

//$sql = "select name, trainer from member";

$results = $db->query("SELECT id, name, height, weight, muscle, fat, gender, birth, intro FROM member WHERE name = '$name'");
$result_array = array();

//var_dump($results->rowCount());
//echo("<br>");
//array_push($result_array, $results->rowCount());

if ($results->rowCount() > 0)
{
    foreach ($results as $row){
        //echo $row[name]."/".$row[trainer]."<br>";
        array_push($result_array,$row);
    }

}
echo json_encode($result_array);
