<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';


session_start();

if(is_logined() === true){
  redirect_to(HOME_URL);
}
// var_dump($_POST);
$name = get_post('name');
$password = get_post('password');
// var_dump($name);
// var_dump($password);

$db = get_db_connect();

$user = login_as($db, $name, $password);
// POSTされてきたトークン
$token = get_post('token');

//セッションに保管されているトークンがPOSTされたトークンと一致しているか
if (is_valid_csrf_token($token) === false ){
  set_error('不正アクセスです');
  redirect_to(LOGIN_URL);
}

if( $user === false){
  set_error('ログインに失敗しました。');
  redirect_to(LOGIN_URL);
}

set_message('ログインしました。');
// if ($user['type'] === USER_TYPE_ADMIN){
//   redirect_to(ADMIN_URL);
// }
redirect_to(HOME_URL);
// var_dump($user);