<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'shop.php';
require_once MODEL_PATH . 'city.php';

session_start();

if(is_logined() === false){
  redirect_to(LOGIN_URL);
}

$db = get_db_connect();

$token = get_csrf_token();
$user = get_login_user($db);
$user_id = $user['user_id'];
$shop_id = get_data('shop_id');
$edit_shop = get_shop_data($db, $shop_id);
include_once VIEW_PATH . 'edit_view.php';