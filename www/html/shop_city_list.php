<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
// require_once MODEL_PATH . 'genre.php';
// require_once MODEL_PATH . 'city.php';
require_once MODEL_PATH . 'shop.php';

session_start();

// if(is_logined() === false){
//   redirect_to(LOGIN_URL);
// }

// var_dump($_SESSION);
$db = get_db_connect();
$user = get_login_user($db);
$city_id = get_data('city_id');  //ユーザーが市町村を指定してきたとき
$shops = get_shop_data_by_city($db, $city_id);
var_dump($_GET);

include_once VIEW_PATH . 'shop_list_view.php';
