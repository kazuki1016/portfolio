<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
// require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'genre.php';
require_once MODEL_PATH . 'city.php';

session_start();

// if(is_logined() === false){
//   redirect_to(LOGIN_URL);
}

$db = get_db_connect();
// $user = get_login_user($db);

// トークンの生成
$token = get_csrf_token();
// $shops = get_shops(db);

include_once VIEW_PATH . '/history_view.php';
