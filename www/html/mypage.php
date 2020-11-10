<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'shop.php';

session_start();

if(is_logined() === false){
  redirect_to(LOGIN_URL);
}

$db = get_db_connect();
// var_dump($_SESSION);

$token = get_csrf_token();
$user = get_login_user($db);
$user_id = $user['user_id'];
$my_shoplists = get_my_shoplist($db, $user_id);
for($i=0; $i<count($my_shoplists); $i++){
  $my_shoplists_ids[] = $my_shoplists[$i]['shop_id'];
}
set_session('my_shoplists_ids', $my_shoplists_ids);

include_once VIEW_PATH . 'mypage_view.php';