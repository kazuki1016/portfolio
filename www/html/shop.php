<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'genre.php';
require_once MODEL_PATH . 'city.php';
require_once MODEL_PATH . 'shop.php';

// session_start();

// if(is_logined() === false){
//   redirect_to(LOGIN_URL);
// }

$shop_id = get_data('shop_id');
$db = get_db_connect();
$user = get_login_user($db);
$shop = get_shop_data($db, $shop_id);
// var_dump($shop);



include_once VIEW_PATH . 'shop_view.php';
