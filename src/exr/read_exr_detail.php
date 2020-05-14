
<?php

include "dbconfig.php";

$title = $_POST['title'];

$results = $db->query("SELECT period, equip, gender, level, max, intro from exr_program where title = '$title'");
$result_array = array();
if ($results->rowCount() > 0)
{
    foreach ($results as $row){
        array_push($result_array,$row);
    }

}

echo json_encode($result_array);

?>