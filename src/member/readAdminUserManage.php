<?php

include "dbconfig.php";

$name = $_GET['name'];
$trainer = $_GET['trainer'];

//$sql = "select name, trainer from member";

$results = $db->query('SELECT name, trainer FROM member');
$result_array = array();
if ($results->rowCount() > 0)
{
    foreach ($results as $row){
        array_push($result_array,$row);
    }

}

echo json_encode(array("result"=>$result_array));
?>
