<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'shop.php';

session_start();

if(is_logined() === false){
  redirect_to(LOGIN_URL);
}

$db = get_db_connect();
$token = get_csrf_token();
$user = get_login_user($db);
$user_id = get_session('user_id');
$bookmark_lists = get_bookmark_list($db, $user_id);

if(insert_bookmark_list($db, $user_id, $shop_id)){
  set_message('お気に入りに登録しました');
} else {
  set_error('お気に入りに失敗しました');
}
redirect_to(BOOKMARK_URL);
// include_once VIEW_PATH . 'add_comp_view.php';