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
$exr_url = $home_url . "/exr";

switch ($src[0]) {
    case '':
    case '/' :
        require $home_url . '/home.html';
        break;
    case '/member/create' :
        require $user_url . '/create.php';
        break;

    case '/member/read' :
        require $user_url . '/read.php';
        break;
    case '/member/readmemexrprogram' :
        require $user_url . '/read_mem_exr_program.php';
        break;
    case '/member/memberexrprogram' :
        require $user_url . '/member_exr_program.php';
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
    case '/member/readTrainerData' :
        require $user_url . '/readTrainerData.php';
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


    case '/exr/read_exr_program' :
        require $exr_url . '/read_exr_program.php';
        break;
    case '/exr/create_exr_program' :
        require $exr_url . '/create_exr_program.php';
        break;
    case '/exr/delete_exr_program' :
        require $exr_url . '/delete_exr_program.php';
        break;
    case '/exr/update_exr_program' :
        require $exr_url . '/update_exr_program.php';
        break;


    case '/video/create_tr_video' :
        require $video_url . '/create_tr_video.php';
        break;
    case '/video/delete_tr_video' :
        require $video_url . '/delete_tr_video.php';
        break;
    case '/video/read_tr_video' :
        require $video_url . '/read_tr_video.php';
        break;

    case '/storage' :
        require $home_url . '/storage.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/src/error.html';
        break;
}
?>
