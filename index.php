<?php

$request = $_SERVER['REQUEST_URI'];
//echo $_SERVER['REQUEST_URI']." ///// \n";
//echo $_SERVER['QUERY_STRING']." ///// \n";
//echo $_SERVER['REMOTE_ADDR']." ///// \n";
//echo $_SERVER['REMOTE_HOST']." ///// \n";
//echo $_SERVER['SERVER_ADDR']." ///// \n";

$src = explode("?", $request);

$home_url = __DIR__ . '/src';
$user_url = $home_url . "/member";
$video_url = $home_url . "/video";

switch ($src[0]) {
    case '':
    case '/' :
        require $home_url . '/home.html';
        break;
    case '/member/create' :
        require $user_url . '/create.php';
        break;
    case '/member/exrDetail' :
        require $user_url . '/exrDetail.php';
        break;
    case '/member/read' :
        require $user_url . '/read.php';
        break;
    case '/member/readmemexrprogram' :
        require $user_url . '/readmemexrprogram.php';
        break;
    case '/member/memberexrprogram' :
        require $user_url . '/memberexrprogram.php';
        break;
    case '/member/update' :
        require $user_url . '/update.php';
        break;
    case '/member/delete' :
        require $user_url . '/delete.php';
        break;
    case '/member/login' :
        require $user_url . '/login.php';
        break;
    case '/member/signup' :
        require $user_url . '/signup.php';
        break;
    case '/member/homeData' :
        require $user_url . '/homeData.php';
        break;
    case '/member/chatList' :
        require $user_url . '/chatList.php';
        break;
    case '/member/readAdminUserManage' :
        require $user_url . '/readAdminUserManage.php';
        break;
    case '/member/deleteAdminUserManage' :
        require $user_url . '/deleteAdminUserManage.php';
        break;
    case '/member/readTrainerList' :
        require $user_url . '/readTrainerList.php';
        break;
    case '/member/readTrainerRating' :
        require $user_url . '/readTrainerRating.php';
        break;
    case '/member/setAlarm' :
        require $user_url . '/setAlarm.php';
        break;
    case '/member/setProfile' :
        require $user_url . '/setProfile.php';
        break;
    case '/member/setPwd' :
        require $user_url . '/setPwd.php';
        break;
    case '/storage' :
        require $home_url . '/storage.php';
        break;
    case '/video/tr_video_create' :
        require $video_url . '/tr_video_create.php';
        break;
    case '/video/tr_video_read' :
        require $video_url . '/tr_video_read.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/src/error.html';
        break;
}
?>
