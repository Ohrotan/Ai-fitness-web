<?php

include "dbconfig.php";

$name = $_GET[name];
$trainer = $_GET[trainer];

//$sql = "select name, trainer from member";

$results = $db->query('SELECT name, trainer FROM member');
$result_array = array();

//var_dump($results->rowCount());
//echo("<br>");
array_push($result_array, $results->rowCount());

if ($results->rowCount() > 0)
{
    foreach ($results as $row){
        //echo $row[name]."/".$row[trainer]."<br>";
        array_push($result_array,$row);
    }

}
echo json_encode($result_array);
?>
