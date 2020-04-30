
<?php

$request = $_SERVER['REQUEST_URI'];
//echo $_SERVER['REQUEST_URI']." ///// \n";
//echo $_SERVER['QUERY_STRING']." ///// \n";
$src = explode("?",$request);

$home_url = __DIR__ . '/src';
$user_url = $home_url . "/member";

switch($src[0]){
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
    case '/member/update' :
        require $user_url . '/update.php';
        break;
    case '/member/delete' :
        require $user_url . '/delete.php';
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
