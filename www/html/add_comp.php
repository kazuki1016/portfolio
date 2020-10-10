<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'shop.php';

session_start();

if(is_logined() === false){
  redirect_to(HOME_URL);
}


// var_dump($_SESSION);
$shop_name = get_post('shop_name');
$genre_id = get_post('genre_id');
$city_id = get_post('city_id');
$image = get_file('image');
$token = get_post('token');
$shop_detail = get_post('shop_detail');
var_dump($shop_name);
var_dump($image);

$db = get_db_connect();

if (is_valid_csrf_token($token) === false ){
  set_error('不正アクセスです');
  redirect_to(SIGNUP_URL);
}

$genre_ids = array();
$city_ids = array();
// ジャンルIDの取得
foreach($_SESSION['genres'] as $genre_id_array) {
  $genre_ids[] = $genre_id_array['genre_id'];
}

// 市町村IDの取得
foreach($_SESSION['citys'] as $city_id_array) {
  $city_ids[] = $city_id_array['city_id'];
}



if(regist_shop($db, $shop_name, $genre_id, $genre_ids, $city_id, $city_ids, $shop_detail, $image)){
  set_message('お店登録が完了しました。');
} else{
  set_error('お店登録に失敗しました。');
}
// redirect_to(MYPAGE_URL);

include_once VIEW_PATH . '/add_comp_view.php';





