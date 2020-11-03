<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'shop.php';

session_start();

$db = get_db_connect();
$user = get_login_user($db);
// 管理者でなければ削除できない
if(is_logined() === false && $user['user_name'] === "admin"){
  redirect_to(LOGIN_URL);
}
$token = get_csrf_token();
$shop_id = get_data('shop_id');
$filename = get_data('filename');
$db->beginTransaction();
if(delete_shop($db, $shop_id) && file_exists(IMAGE_DIR.$filename)){
  if(unlink(IMAGE_DIR.$filename)){
    $db->commit();
    set_message('お店を削除しました');
  } else {
    $db->rollback();
    set_error('画像削除ができません。管理者にお問い合わせください。');
  }
} else {
  $db->rollback();
  set_error('お店を削除に失敗しました');
}

include_once VIEW_PATH . 'add_comp_view.php';

