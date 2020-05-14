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
$day_exr_url = $home_url . "/day_exr";
$day_video_url = $home_url ."/day_video";


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
    case '/member/read_login' :
        require $user_url . '/read_login.php';
        break;
    case '/member/create_signup' :
        require $user_url . '/create_signup.php';
        break;
    case '/member/read_home_data' :
        require $user_url . '/read_home_data.php';
        break;
    case '/member/read_chat_list' :
        require $user_url . '/read_chat_list.php';
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
        require $exr_url . '/read.php';
        break;
    case '/exr/create_exr_program' :
        require $exr_url . '/create.php';
        break;
    case '/exr/delete_exr_program' :
        require $exr_url . '/delete.php';
        break;
    case '/exr/update_exr_program' :
        require $exr_url . '/update.php';
        break;


    case '/day_exr/create' :
        require $day_exr_url . '/create.php';
        break;
    case '/day_exr/delete' :
        require $day_exr_url . '/delete.php';
        break;
    case '/day_exr/read' :
        require $day_exr_url . '/read.php';
        break;
    case '/day_exr/update' :
        require $day_exr_url . '/update.php';
        break;

    case '/day_video/create' :
        require $day_video_url . '/create.php';
        break;
    case '/day_video/delete' :
        require $day_video_url . '/delete.php';
        break;
    case '/day_video/read' :
        require $day_video_url . '/read.php';
        break;
    case '/day_video/update' :
        require $day_video_url . '/update.php';
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
