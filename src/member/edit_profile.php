<?php
require 'vendor/autoload.php';
include "dbconfig.php";

use Google\Cloud\Storage\StorageClient;

$allowedExts = array("jpg", "jpeg", "png");
$extension = pathinfo($_FILES['myFile']['name'], PATHINFO_EXTENSION);//확장자 추출해서 $extension에 저장
$image_file_name =  "profile_img/".$_FILES["myFile"]["name"];//이미지 파일명을 $image_file_name에 저장


//*****아이디 중복이면 에러처리하는 코드 추가해야 함

if (in_array($extension, $allowedExts)//허용된 확장자만 업로드 하도록 제한.
    && ($_FILES["myFile"]["size"] < 100*1024*1024)) {

    if ($_FILES["myFile"]["error"] > 0) {//에러 체크
        echo "Return Code: " . $_FILES["myFile"]["error"] . "<br />";
    }
    else {
        echo "Upload: " . $image_file_name. "<br />";//전송된 파일의 실제 이름값
        echo "Type: " . $_FILES["myFile"]["type"] . "<br />";//전송된 파일의 형식
        echo "Size: " . ($_FILES["myFile"]["size"] / 1024) . " Kb<br />";//전송된 파일의 용량(KB단위)
        echo "Temp file: " . $_FILES["myFile"]["tmp_name"] . "<br />";//서버에 저장된 임시 복사본의 이름

        //스토리지에 업로드하는 부분
        // Authenticating with keyfile data.
        $storage = new StorageClient([
            'keyFile' => json_decode(file_get_contents('/srv/key.json'), true)
        ]);

        $bucket = $storage->bucket('ai-fitness');
        $bucket->upload(fopen($_FILES["myFile"]["tmp_name"], 'r'), [
            'name' => $image_file_name
        ]);


        //db에도 업로드
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];
        $name = $_POST['name'];
        $birth = $_POST['birth'];
        $id = $_POST['id'];
        $admin = $_POST['admin'];
        $alarm = $_POST['alarm'];
        $height = $_POST['height'];
        $weight = $_POST['weight'];
        $muscle = $_POST['muscle'];
        $fat = $_POST['fat'];
        $intro = $_POST['intro'];
        $trainer = (int)$_POST['trainer'];
        $image = "ai-fitness/".$image_file_name;

        $sql = "UPDATE member SET 
height = '$height', 
weight = '$weight', 
muscle = '$muscle', 
fat = '$fat', 
intro = '$intro', 
trainer = '$trainer', 
image = '$image',
email = '$email',
name = '$name',
pwd = '$pwd',
id = '$id',
birth = '$birth',
admin = '$admin',
alarm = '$alarm'
WHERE id = '$id'";
        $stmt = $db->prepare($sql);
        $result = $stmt->execute();


        echo $result;

//        $results = $db->query('SELECT * from trainer_video');
//        $result_array = array();
//        if ($results->rowCount() > 0)
//        {
//            foreach ($results as $row){
//                echo $row[trainer_id]."/".$row[title]."/".$row[video]."<br>";
//                array_push($result_array,$row);
//            }
//
//        }
//        echo json_encode($result_array);

    }
} else {
    echo "Invalid file";
}


//---------------------------


//*****아이디 중복이면 에러처리하는 코드 추가해야 함


//$stmt = $db->prepare($sql);
//$insert_success = $stmt->execute();
//
//$result_array = array();
//if ($insert_success) {  //성공적으로 생성 됐으면 해당 유저의 정보를 다시 앱으로 전송한다.
//
//    $results = $db->query("SELECT * from member WHERE email = '$email' AND pwd = '$pwd'");
//
//    if ($results->rowCount() > 0)
//    {
//        foreach ($results as $row){
//            array_push($result_array,$row);
//        }
//
//    }
//}
//else {
//    array_push($result_array,"error");
//}
//
//echo json_encode($result_array);
?>