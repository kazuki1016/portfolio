<?php
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'db.php';
require_once MODEL_PATH . 'validate.php';

 // 口コミテーブルに追加
 function insert_comment($db, $user_id, $shop_id, $comment_title, $comment_body){
  $sql = "
    INSERT INTO
      comments(
        user_id,
        shop_id,
        comment_title,
        comment_body
        )
    VALUES(?, ?, ?, ?);
  ";
  return execute_query($db, $sql, array($user_id, $shop_id, $comment_title, $comment_body));
}

// 口コミ画像テーブルに登録
function insert_comment_image($db, $comment_id, $filename){
  $sql = "
    INSERT INTO
      comment_images(
        comment_id,
        comment_image
      )
    VALUES(?, ?);
  ";
  return execute_query($db, $sql, array($comment_id, $filename));
}

//お店毎のコメントを取得
function get_comment($db, $shop_id){
  $sql = "
    SELECT 
      comments.comment_id, 
      comments.shop_id, 
      comments.comment_title, 
      comments.comment_body, 
      DATE_FORMAT(comments.create_datetime,'%Y/%m/%d') AS comment_date,
      shops.shop_name,
      userinfo.user_name 
    FROM 
      ((comments
    INNER JOIN 
      shops ON comments.shop_id = shops.shop_id)
    INNER JOIN 
      userinfo ON comments.user_id = userinfo.user_id)
    WHERE 
      comments.shop_id = ?;
  ";
  return fetch_all_query($db, $sql, array($shop_id));
}

function get_comment_image($db, $comment_id){
  $sql = "
    SELECT 
      comment_images.comment_image
    FROM 
      comment_images
    WHERE 
      comment_images.comment_id = ?;
  ";
  return fetch_all_query($db, $sql, array($comment_id));
}

//管理者ページのコメント一覧表示
function get_comment_list($db){
  $sql = "
    SELECT 
    comments.comment_id, 
    comments.comment_title, 
    DATE_FORMAT(comments.create_datetime,'%Y/%m/%d') AS create_date,
    DATE_FORMAT(comments.update_datetime,'%Y/%m/%d') AS update_date,
    userinfo.user_name, 
    shops.shop_name
    FROM 
      ((comments
    INNER JOIN 
      shops ON comments.shop_id = shops.shop_id)
    INNER JOIN
      userinfo ON comments.user_id = userinfo.user_id)
  ";
  return fetch_all_query($db, $sql, array());
}


/** コメント投稿をデータベースへ追加する処理＝regist_comment
 * 1：バリデーションの処理=validate_comment
 * 2：実際に登録する処理＝insert_comment
*/
function regist_comment($db, $user_id, $shop_id, $comment_title, $comment_body){
  if(validate_comment($user_id, $shop_id, $comment_title, $comment_body) === false){
    return false;
  }
  return insert_comment($db, $user_id, $shop_id, $comment_title, $comment_body);
}

function validate_comment($user_id, $shop_id, $comment_title, $comment_body){  
  $is_valid_user_id = is_valid_user_id($user_id);
  $is_valid_shop_id = is_valid_shop_id($shop_id);
  $is_valid_comment_title = is_valid_comment_title($comment_title);
  $is_valid_comment_body = is_valid_comment_body($comment_body);
  
  return $is_valid_user_id
  && $is_valid_shop_id
  && $is_valid_comment_title
  && $is_valid_comment_body;
}

// // ここまでがコメント投稿をデータベースへ追加する処理

/** コメント画像をデータベースへ追加する処理＝regist_comment_image
 * 1：バリデーションの処理=validate_comment_image
 * 2：実際に登録する処理＝insert_comment_image
*/
function regist_comment_image($db, $comment_id, $file_data){
  $filename = get_upload_filename($file_data);
  if(validate_comment_image($filename)===false){
    return false;
  }
  return regist_comment_image_transaction($db, $comment_id, $file_data, $filename);
}

function regist_comment_image_transaction($db, $comment_id, $file_data, $filename){
  if(insert_comment_image($db, $comment_id, $filename) && save_comment_image($file_data, $filename)){
    return true;
  } 
  return false;
}

function validate_comment_image($filename){
  $is_valid_filename = is_valid_filename($filename);
  return $is_valid_filename;
}
