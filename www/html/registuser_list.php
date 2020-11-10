<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'shop.php';

session_start();

$db = get_db_connect();
$user = get_login_user($db);

if(is_logined() === false  || $user['user_name'] !== "admin" ){
  redirect_to(LOGIN_URL);
}
$user_lists = get_user_list($db);

include_once VIEW_PATH . 'resistuser_list_view.php';