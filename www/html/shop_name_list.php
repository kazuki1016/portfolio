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

// var_dump($_SESSION);
$db = get_db_connect();
$user = get_login_user($db);
$shop_name = get_data('shop_name');   //ユーザーがお店の名前を検索してきたとき。データベースにLIKE演算子として値を渡す
$serch_shop_name = "%{$shop_name}%";
$shops = get_shop_data_by_name($db, $serch_shop_name);
 var_dump($shop_name);
 var_dump($serch_shop_name);

include_once VIEW_PATH . 'shop_list_view.php';
