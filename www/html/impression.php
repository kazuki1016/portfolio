<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'shop.php';
require_once MODEL_PATH . 'genre.php';
require_once MODEL_PATH . 'city.php';

session_start();

if(is_logined() === false){
  redirect_to(HOME_URL);
}

$db = get_db_connect();
$user = get_login_user($db);
$token = get_csrf_token();
$shop_id = get_data('shop_id');
$shop = get_shop_data($db, $shop_id);
var_dump($shop);
include_once VIEW_PATH . 'impressiotn_view.php';
