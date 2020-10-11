<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';

session_start();

if(is_logined() === false){
  redirect_to(HOME_URL);
}

 var_dump($_SESSION['user_id']);
$genre_id = get_post('genre_id');
$city_id = get_post('city_id');
$shop_name = get_post('shop_name');
$genre_name = get_post('genre_name');
$city_name = get_post('city_name');
$image = get_post('image');
$token = get_post('token');
$shop_detail = get_post('shop_detail');

$db = get_db_connect();

if (is_valid_csrf_token($token) === false ){
  set_error('不正アクセスです');
  redirect_to(HOME_URL);
}


include_once VIEW_PATH . 'add_process_view.php';
