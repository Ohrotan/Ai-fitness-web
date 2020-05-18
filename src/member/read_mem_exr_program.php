
<?php

include "dbconfig.php";

//$mem_id = $_POST['mem_id'];
$mem_id = "4";

$results = $db->query("SELECT * FROM exr_program left JOIN (SELECT exr_id, avg(rating) as rating FROM member_reg_program  GROUP BY exr_id) AS rat ON rat.exr_id = exr_program.id left JOIN  (SELECT id, name FROM member GROUP BY id) AS mem ON exr_program.trainer_id = mem.id;");
$result_array = array();
if ($results->rowCount() > 0)
{
    foreach ($results as $row){
        array_push($result_array,$row);
    }

}
echo json_encode(array("result"=>$result_array));

?>