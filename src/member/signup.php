<?php
include "dbconfig.php";
include_once "src/paramsCheck.php";

$email = $_POST['email'];
$pwd = $_POST['pwd'];
$name = $_POST['name'];
$height = $_POST['height'];
$weight = (double)$_POST['weight'];
$gender = $_POST['gender'] === '남' ? 1 : 0;
$birth = $_POST['birth'];
$muscle = (double)$_POST['muscle'];
$fat = (double)$_POST['fat'];
$intro = $_POST['intro'];
$image = $_POST['image'];
$trainer = $_POST['trainer'] === '트레이너' ? 1 : 0;
$admin = (int)$_POST['admin'];
$alarm = (int)$_POST['alarm'];

//*****아이디 중복이면 에러처리하는 코드 추가해야 함


$sql = "insert into member(email, pwd, name, height, weight, gender, birth, muscle, fat, intro, image, trainer, admin, alarm) values('$email', '$pwd', '$name', '$height', '$weight', '$gender','$birth', '$muscle', '$fat', '$intro', '$image', '$trainer', '$admin', '$alarm')";
$stmt = $db->prepare($sql);
$insert_success = $stmt->execute();

$result_array = array();
if ($insert_success) {  //성공적으로 생성 됐으면 해당 유저의 정보를 다시 앱으로 전송한다.

    $results = $db->query("SELECT * from member WHERE email = '$email' AND pwd = '$pwd'");

    if ($results->rowCount() > 0)
    {
        foreach ($results as $row){
            array_push($result_array,$row);
        }

    }
}
else {
    array_push($result_array,"error");
}

echo json_encode($result_array);
?>