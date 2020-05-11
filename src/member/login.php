<?php

include "dbconfig.php";
include_once "src/paramsCheck.php";

$email = $_POST['email'];
$pwd = $_POST['pwd'];

$results = $db->query("SELECT * from member WHERE email = '$email' AND pwd = '$pwd'");
$result_array = array();
if ($results->rowCount() > 0)
{
    foreach ($results as $row){
        array_push($result_array,$row);
    }

}
echo json_encode($result_array);


////응답으로 보낼 배열 생성
//$response = array();
//
//echo "11111<br />";
//
//
////로그인하려면 사용자 id와 pwd가 필요함
//if(isTheseParametersAvailable(array('email', 'password'))) {
//
//    echo "22222<br />";
//
//
//    //받은 값들을 넣어줌
//    $email = $_POST['email'];
//    $password = md5($_POST['password']);
//
//    echo $email . "<br />";
//
//    //**********여기 이하는 수행이 안되는 이유를 모르겠음
//
//    //쿼리 생성
//    //$stmt = $db->prepare("SELECT id, pwd, name, height, weight, gender, birth, muscle, fat, intro, image_from_storage.php, trainer, andmin, alarm  FROM Member WHERE username = ? AND password = ?");
//    $stmt =  $db->stmt_init();
//    $stmt->prepare("SELECT id, pwd FROM member WHERE id = ? AND pwd = ?");
//    $stmt->bind_param("ss", $email, $password);
//
//    $stmt->execute();//생성한 쿼리를 실행
//
//    $stmt->store_result();
//
//    //사용자가 존재하는 경우. num_rows는 명령문 결과 세트의 행 수를 리턴하기 때문에 0보다 크면 존재하는 것.
//    if ($stmt->num_rows > 0) {
//
//        echo "333333<br />";
//
//        $id = null;
//        $pwd = null;
//        //결과 저장을 위해 준비된 쿼리의 결과 컬럼에 알맞게 변수를 바인드함.
//        $stmt->bind_result($id, $pwd);
//
//        $stmt->fetch(); //쿼리의 결과를 바인딩된 변수로 가져온다.
//
//        $user = array(
//            'id' => $id,
//            'pwd' => $pwd,
//            'name' => null,
//            'height' => 0,
//            'weight' => 0,
//            'gender' => 0,
//            'birth' => null,
//            'muscle' => 0,
//            'fat' => 0,
//            'intro' => null,
//            'image_from_storage.php' => null,
//            'trainer' => 0,
//            'andmin' => 0,
//            'alarm' => 0
//        );
//
//        $response['error'] = false;
//        $response['message'] = 'Login successfull';
//        $response['user'] = $user;
//    } else {
//        echo "4444444<br />";
//
//        //유저가 존재하지 않는경우
//        $response['error'] = true;
//        $response['message'] = 'Invalid username or password';
//    }
//}


////json 구조로 응답 표시
//echo json_encode($response);


?>