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
    case '/member/readavgrating' :
        require $user_url . '/read_avg_rating.php';
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
    case '/member/read_admin_user_manage' :
        require $user_url . '/read_admin_user_manage.php';
        break;
    case '/member/delete_admin_user_manage' :
        require $user_url . '/delete_admin_user_manage.php';
        break;
    case '/member/read_trainer_list' :
        require $user_url . '/read_trainer_list.php';
        break;
    case '/member/read_trainer_rating' :
        require $user_url . '/read_trainer_rating.php';
        break;
    case '/member/read_trainer_data' :
        require $user_url . '/read_trainer_data.php';
        break;
    case '/member/read_trainer_program' :
        require $user_url . '/read_trainer_program.php';
        break;
    case '/member/read_trainer_program_num' :
        require $user_url . '/read_trainer_program_num.php';
        break;
    case '/member/read_reg_member' :
        require $user_url . '/read_reg_member.php';
        break;
    case '/member/read_member_detail' :
        require $user_url . '/read_member_detail.php';
        break;
    case '/member/read_day_program_title' :
        require $user_url . '/read_day_program_title.php';
        break;
    case '/member/set_alarm' :
        require $user_url . '/set_alarm.php';
        break;
    case '/member/set_profile' :
        require $user_url . '/set_profile.php';
        break;
    case '/member/set_pwd' :
        require $user_url . '/set_pwd.php';
        break;
    case '/member/edit_profile' :
        require $user_url . '/edit_profile.php';
        break;


    case '/exr/read' :
        require $exr_url . '/read.php';
        break;
    case '/exr/create' :
        require $exr_url . '/create.php';
        break;
    case '/exr/delete' :
        require $exr_url . '/delete.php';
        break;
    case '/exr/update' :
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
    case '/day_exr/read_day_program' :
        require $day_exr_url . '/read_day_program.php';
        break;
    case '/day_exr/read_day_program_after' :
        require $day_exr_url . '/read_day_program_after.php';
        break;
    case '/day_exr/update_member_history_feedback' :
        require $day_exr_url . '/update_member_history_feedback.php';
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
    case '/video/update_tr_video' :
        require $video_url . '/update_tr_video_title.php';
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
