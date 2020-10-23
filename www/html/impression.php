<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
// require_once MODEL_PATH . 'shop.php';
require_once MODEL_PATH . 'comment.php';
// require_once MODEL_PATH . 'genre.php';
// require_once MODEL_PATH . 'city.php';

session_start();

if(is_logined() === false){
  redirect_to(HOME_URL);
}
//  var_dump($_SESSION);

$db = get_db_connect();
$user = get_login_user($db);
$token = get_csrf_token();
$shop_id = get_session('shop_id');
$comments = get_comment($db, $shop_id);
// print('<pre>');
//   var_dump($comments);

//  print('<pre>');

for($i=0; $i < count($comments); $i++){
  $comment_id[] = $comments[$i]['comment_id'];
  $comment_images[] = get_comment_image($db, $comment_id[$i]);
  foreach($comment_images as $file_data){
    $comments[$i]['comment_images'] = $file_data;
  }
}

// foreach($comments as $comment){
//   var_dump($comment);
// }
// print('<pre>');
//   var_dump($comments);

// print('<pre>');
// print('<pre>');
//   var_dump($comments['comment_images']);

// print('<pre>');



//  foreach($comment_images as $comment_image) {
//   foreach($comment_image as $image_data){
//     var_dump($image_data);
//   }
// }
// $shop_id = get_data('shop_id');
// $shop = get_shop_data($db, $shop_id);
// var_dump($shop);
include_once VIEW_PATH . 'impressiotn_view.php';
