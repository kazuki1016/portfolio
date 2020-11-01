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
$shop_id = get_post('shop_id');
$user_id = get_session('user_id');
var_dump($shop_id);

if(delete_bookmark($db, $shop_id)){
  set_message('お気に入り一覧から削除しました');
} else {
  set_error('お気に入り一覧からの削除に失敗しました');
}
//ユーザーのブックマーク済みのshop_idを更新してセッションに登録
$bookmark_lists = get_bookmark_list($db, $user_id); //データベースからユーザーのお気に入り一覧を取得
for($i=0; $i<count($bookmark_lists); $i++){
  $bookmarked_shop_ids[] = $bookmark_lists[$i]['shop_id'];
}
set_session('bookmarked_shop_ids', $bookmarked_shop_ids);


include_once VIEW_PATH . 'bookmark_view.php';