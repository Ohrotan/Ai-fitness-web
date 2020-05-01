
<?php

include "dbconfig.php";

$name = $_GET[name]; //$_POST[name];
$id = $_GET[id];
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
$results = $db->query('SELECT * from member');

if ($results->rowCount() > 0)
{
    foreach ($results as $row){
        echo $row[id]."/".$row[name]."<br>";
    }

}
echo json_encode($results->fetchAll());
?>
