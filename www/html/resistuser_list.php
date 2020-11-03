<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'shop.php';

session_start();

$db = get_db_connect();
$user_id = $user['user_id'];
$user = get_login_user($db);

if(is_logined() === false  && $user['name'] === "admin" ){
  redirect_to(LOGIN_URL);
}

//  var_dump($_SESSION['my_shoplists_ids']);
//  var_dump($_SESSION['bookmarked_shop_ids']);

$token = get_csrf_token();
$user_lists = get_user_list($db);

include_once VIEW_PATH . 'resistuser_list_view.php';