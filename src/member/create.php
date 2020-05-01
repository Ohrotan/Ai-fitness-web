
<?php
include "dbconfig.php";

$name = $_POST[name]; //$_POST[name];
$id = $_POST[id];

//1번 방법
$sql = "INSERT INTO member (id, name) VALUES ('$id','$name')";
$stmt = $db->prepare($sql);
$stmt->execute();

//2번 방법
/*
    $stmt = $db->prepare('INSERT INTO memb (id, name) VALUES (:id, :name)');
    $stmt->execute([
        ':id' => $_POST['id'],
        ':name' => $_POST['name'],
    ]);
*/

$results = $db->query('SELECT * from member');

if ($results->rowCount() > 0)
{
    foreach ($results as $row){
        echo $row[id]."/".$row[name]."<br>";
    }

}

?>

