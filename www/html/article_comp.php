<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
// require_once MODEL_PATH . 'shop.php';
require_once MODEL_PATH . 'comment.php';
session_start();

if(is_logined() === false){
  redirect_to(LOGIN_URL);
}
$db = get_db_connect();
$user = get_login_user($db);
$shop_id = get_post('shop_id');
$user_id = get_post('user_id');

$comment_title = get_post('comment_title');
$comment_body = get_post('comment_body');
$comment_images = get_file('comment_images');
$image_num = count($comment_images['name']); //postされた$comment_imagesの中身の個数をカウント。画像の名前をカウントすることに。$comment_imagesではだめ（var_dumpするとわかる）
$file_data=array();  //配列として定義
$arr=array(); //配列として定義

//画像1枚のをアップロードするときと同じ配列になるようにpostされた数だけ再定義する
 for($i=0; $i<$image_num; $i++){  
   $name = $comment_images['name'][$i];
   $type = $comment_images['type'][$i];
   $tmp_name = $comment_images['tmp_name'][$i];
   $error = $comment_images['error'][$i];
   $size = $comment_images['size'][$i];
//$arrに$_FILEと同じように定義する
   $arr['name']=$name;
   $arr['type']=$type;
   $arr['tmp_name']=$tmp_name;
   $arr['error']=$error;
   $arr['size']=$size;
//postされた各画像データのパラメーターを配列として定義（多次元配列とする）
   $file_data[]=$arr;
 }

// $db->beginTransaction();
  if(regist_comment($db, $user_id, $shop_id, $comment_title, $comment_body)){
    $comment_id = $db->lastInsertId();  
  } else {
    set_error('口コミ登録に失敗しました');
    // redirect_to(ARTICLE_URL);
  }

  for($j=0; $j<count($file_data); $j++){
    if(regist_comment_image($db, $comment_id, $file_data[$j])) {
      set_message('口コミ登録に成功しました');
      // $db->commit();
    } else {
      set_error('画像の投稿に失敗しました');
      // $db->rollback();
    }
  }
include_once VIEW_PATH . '/add_comp_view.php';

// redirect_to(MYPAGE_URL);
