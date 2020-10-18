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
// try{
  if(insert_comment($db, $user_id, $shop_id, $comment_title, $comment_body)===false){
    set_error('口コミ登録に失敗しました');
    // redirect_to(ARTICLE_URL);
  }
  $comment_id = $db->lastInsertId();  
  for($j=0; $j<count($file_data); $j++){
    if(regist_comment_image($db, $comment_id, $file_data[$j])===false) {
    set_error('画像の投稿に失敗しました');
    }
  }
// } catch (PDOException $e) {
//   throw $e->getMessage();
// }
set_message('口コミ登録に成功しました');
include_once VIEW_PATH . '/add_comp_view.php';

// redirect_to(MYPAGE_URL);


// //商品の購入〜履歴追加までトランザクション
// $db->beginTransaction();
// try{
//   if(purchase_carts($db, $carts) === false){
//     set_error('商品が購入できませんでした。');
//     redirect_to(CART_URL);
//   }
//   if(insert_history($db, $user['user_id'])===false){
//     set_error('商品履歴の追加に失敗');
//   }
//   $history_id = $db->lastInsertId();  
//   foreach($carts as $history){
//     $at_price = $history['price'];
//     $item_id = $history['item_id'];
//     $amount = $history['amount'];
//     if(insert_history_details($db, $history_id, $at_price, $item_id, $amount) === false){
//       set_error('商品詳細履歴の追加に失敗');
//     }
//   } 
//   $db->commit();
// } catch (PDOException $e) {
//   $db->rollback();
//   throw $e;
// }

// $total_price = sum_carts($carts);


// include_once '../view/finish_view.php';