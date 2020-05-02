<?php
include "dbconfig.php";

$name = $_GET[name]; //$_POST[name];
$id = $_GET[id];
$results = $db->query('SELECT * from member');
$result_array = array();
if ($results->rowCount() > 0)
{
    foreach ($results as $row){
        echo $row[id]."/".$row[name]."<br>";
        array_push($result_array,$row);
    }

}
echo json_encode($result_array);

?>