<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'genre.php';
require_once MODEL_PATH . 'city.php';
require_once MODEL_PATH . 'shop.php';

session_start();

// if(is_logined() === false){
//   redirect_to(LOGIN_URL);
// }

// $shop_id = get_data('shop_id');
// var_dump($_SESSION);
set_session('shop_id', get_data('shop_id')); //ショップIDをセッションに追加する
$shop_id = get_session('shop_id');
$db = get_db_connect();
$user = get_login_user($db);
$shop = get_shop_data($db, $shop_id);
// var_dump($shop);
$shop_name = $shop[0]['shop_name'];
set_session('shop_name', $shop_name); //ショップIDをセッションに追加する

include_once VIEW_PATH . 'shop_view.php';
