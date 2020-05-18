
<?php

include "dbconfig.php";

$exr_id = $_POST['exr_id'];

$results = $db->query("SELECT avg(rating) from member_reg_program where exr_id = '$exr_id'");
$result_array = array();
if ($results->rowCount() > 0)
{
    foreach ($results as $row){
        array_push($result_array,$row);
    }

}

echo json_encode(array("result"=>$result_array));

?>