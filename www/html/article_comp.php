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
$shop_id = get_session('shop_id');
$user_id = get_session('user_id');
// var_dump($shop_id);
// var_dump($user_id);

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

$db->beginTransaction();
try{
  if(regist_comment($db, $user_id, $shop_id, $comment_title, $comment_body)===false){
    // redirect_to(ARTICLE_URL);
  } 
  $comment_id = $db->lastInsertId();  //$comment_idの値を取得
  for($j=0; $j<count($file_data); $j++){  //投稿された画像分だけデータベースへ保存
    if(regist_comment_image($db, $comment_id, $file_data[$j])===false) {
      // redirect_to(ARTICLE_URL);
    } 
  }
  $db->commit();
  set_message('口コミ登録に成功しました');
  
} catch(PDOExeption $e) {  
  $db->rollback();
  print $e->getMessage();
  set_error('口コミ登録に失敗しました');
}

// include_once VIEW_PATH . '/add_comp_view.php';

redirect_to(IMPRESSION_URL);
