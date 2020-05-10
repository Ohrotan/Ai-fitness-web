<?php

include "dbconfig.php";

$id = $_GET[id]; //$_POST[name];
$mem_id = $_GET[$mem_id];
/*
$sql = 'SELECT * from member';
$stmt = $db->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);


if ($results->rowCount() > 0)
{
  foreach ($results as $row){
        echo $row[id]."/".$row[name]."<br>";
}
    // Encode the array to JSON and output the results
    //echo json_encode($results);
}
*/
$results = $db->query('SELECT name, title, start_date, end_date from member as m, exr_program as e, member_reg_program as mrp where mrp.exr_id = e.id and e.trainer_id = m.id');
$result_array = array();
if ($results->rowCount() > 0)
{
    foreach ($results as $row){
        array_push($result_array,$row);
    }

}

echo json_encode(array("result"=>$result_array));

?>