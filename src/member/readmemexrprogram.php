
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
$results = $db->query('SELECT m2.name, title, level, max, rating from member as m, member as m2, exr_program as e, member_reg_program as mrp where mrp.mem_id = 4 and m.id = mrp.mem_id and e.id = mrp.exr_id and e.trainer_id = m2.id');
$result_array = array();
if ($results->rowCount() > 0)
{
    foreach ($results as $row){
        array_push($result_array,$row);
    }

}

echo json_encode(array("result"=>$result_array));

?>