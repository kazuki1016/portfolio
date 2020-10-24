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
$genre_id = get_data('genre_id');  //ユーザーがジャンルを指定してきたとき
$shops = get_shop_data_by_genre($db, $genre_id);
 var_dump($_GET);
//  var_dump($genre_id);
// // var_dump($shop);
// $shop_name = $shop[0]['shop_name'];

include_once VIEW_PATH . 'shop_list_view.php';
