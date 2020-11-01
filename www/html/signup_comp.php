<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';

session_start();

if(is_logined() === true){
  redirect_to(HOME_URL);
}
$db = get_db_connect();
$name = get_post('name');
$password = get_post('password');
$password_confirmation = get_post('password_confirmation');
$token = get_post('token');
$registed_names = get_registed_names($db);  //登録されている名前の一覧を入手
//セッションに保管されているトークンがPOSTされたトークンと一致しているか
if (is_valid_csrf_token($token) === false ){
  set_error('不正アクセスです');
  redirect_to(SIGNUP_URL);
}
$result = regist_user($db, $name, $registed_names, $password, $password_confirmation);
if( $result=== false){
  set_error('ユーザー登録に失敗しました。');
  redirect_to(SIGNUP_URL);
} else {
  set_message('ユーザー登録が完了しました。');
  login_as($db, $name, $password);
  reset_session_user_resist('name', 'password', 'password_confirmation');
  redirect_to(HOME_URL);
}


