<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'comment.php';

session_start();

$db = get_db_connect();
$user = get_login_user($db);

if(is_logined() === false  || $user['user_name'] !== "admin" ){
  redirect_to(LOGIN_URL);
}
$comment_lists = get_comment_list($db);

include_once VIEW_PATH . 'comment_list_view.php';