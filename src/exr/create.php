<?php
include "dbconfig.php";

$id = $_POST[id];
$trainer_id = $_POST[trainer_id];
$title = $_POST[title];
$period = $_POST[period];
$equip = $_POST[equip];
$gender = $_POST[gender];
$level = $_POST[level];
$max = $_POST[max];
$intro = $_POST[intro];

//create new exr program
if ($id == null || $id == "0") {
    $sql = "INSERT INTO exr_program (trainer_id, title, period, equip, gender, level, max, intro, reg_date) "
        . "VALUES ('$trainer_id','$title','$period','$equip','$gender','$level','$max','$intro',ADDTIME(CURRENT_TIMESTAMP,'9:0:0'))";
    $stmt = $db->prepare($sql);
    $result = $stmt->execute();

    $result = $db->query("SELECT id FROM exr_program WHERE trainer_id = $trainer_id AND title = '$title' AND intro = '$intro'");
    echo json_encode($result->fetchObject());
}
else {//update exr program
    $sql = "UPDATE exr_program SET title ='$title', period= '$period', equip= '$equip', gender ='$gender', level= '$level', max ='$max', intro= '$intro' WHERE id = $id";
    $stmt = $db->prepare($sql);
    $result = $stmt->execute();

    //after updating, return day_exr data
    $results = $db->query("SELECT * FROM day_program WHERE exr_id = '$id' ORDER BY seq");
    $result_array = array();
    if ($results->rowCount() > 0) {
        foreach ($results as $row) {
            array_push($result_array, $row);
        }

    }

    echo json_encode($result_array);
}
?>