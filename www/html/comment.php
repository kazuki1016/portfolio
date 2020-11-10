<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
// require_once MODEL_PATH . 'shop.php';
require_once MODEL_PATH . 'comment.php';
// require_once MODEL_PATH . 'genre.php';
// require_once MODEL_PATH . 'city.php';

session_start();

// if(is_logined() === false){
//   redirect_to(HOME_URL);
// }
//  var_dump($_SESSION);

$db = get_db_connect();
$user = get_login_user($db);
$token = get_csrf_token();
$shop_id = get_session('shop_id');
$comments = get_comment($db, $shop_id);
// print('<pre>');
//   var_dump($comments);
//  print('<pre>');

//コメントの数だけ配列の再定義を実施
for($i=0; $i < count($comments); $i++){
  $comment_id[] = $comments[$i]['comment_id'];  //コメントIDを配列としていれる
  $comment_images[] = get_comment_image($db, $comment_id[$i]);  //コメントの数だけ画像を配列にいれる
  foreach($comment_images as $file_data){
    $comments[$i]['comment_images'] = $file_data; //$commentsに画像を配列として挿入。
  }
}

include_once VIEW_PATH . 'comment_view.php';
