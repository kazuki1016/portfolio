<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'shop.php';
require_once MODEL_PATH . 'city.php';

session_start();

// if(is_logined() === false){
//   redirect_to(HOME_URL);
// }
$db = get_db_connect();

// // トークンの生成
$token = get_csrf_token();
$user = get_login_user($db);
$user_id = $user['user_id'];
$my_shoplists = get_my_shoplist($db, $user_id);
include_once VIEW_PATH . 'mypage_view.php';