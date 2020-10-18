<?php
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'db.php';

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


function regist_comment_image($db, $comment_id, $file_data){
  $filename = get_upload_filename($file_data);
  return regist_comment_image_transaction($db, $comment_id, $file_data, $filename);
}

function regist_comment_image_transaction($db, $comment_id, $comment_image, $filename){
  if(insert_comment_image($db, $comment_id, $filename) 
  && save_comment_image($comment_image, $filename)===false){
  return false;
  } else{
  return true;
  }
}


// 口コミ登録関係
// function regist_comment($db, $user_id, $shop_id, $comment_title, $comment_body){
//   // $filename = get_upload_filename($image);
//   if(validate_comment($user_id, $shop_id, $comment_title, $comment_body) === false){
//     return false;
//   }
//   return regist_shop_transaction($db, $shop_name, $genre_id, $city_id, $shop_detail, $image, $filename, $user_id);
// }

// function regist_shop_transaction($db, $shop_name, $genre_id, $city_id, $shop_detail, $image, $filename, $user_id){
//   $db->beginTransaction();
//   if(insert_shop($db, $shop_name, $genre_id, $city_id, $shop_detail, $filename, $user_id) 
//     && save_image($image, $filename)){
//     $db->commit();
//     return true;
//   }
//   $db->rollback();
//   return false;
// }


// // 購入履歴詳細テーブルから読み込む
// //subtotal = 商品ごとの小計
// function get_historys($db, $user_id){
//   if($user_id !== 4){
//     $where = ' WHERE history.user_id = ? ';
//   } else  {
//     $where = '';
//   }
//   $sql = "
//   SELECT 
//     history.history_id,
//     history.create_datetime,
//   SUM( history_details.at_price*history_details.amount) AS total

//   FROM
//     history
//   JOIN
//     history_details
//   ON
// 	history.history_id = history_details.history_id
//   {$where}
//   GROUP BY
//  	  history_id
//   ";
//   if($user_id !== 4){ //管理者ユーザーでなければ自身の履歴しかみれない
//     return fetch_all_query($db, $sql, array($user_id));
//   } else {
//     return fetch_all_query($db, $sql, array());
//   }
// }

// function get_history_details($db, $history_id){
//   $sql = "
//     SELECT
//       history.history_id,
//       history.user_id,
//       history_details.at_price,
//       history_details.amount,
//       history_details.history_details_id,
//       items.item_id,
//       items.name,
//       (history_details.at_price * history_details.amount) AS subtotal
//       FROM
//       ((history_details 
//     JOIN 
//       history 
//     ON 
//       history.history_id = history_details.history_id)
//     JOIN 
//       items 
//     ON 
//       history_details.item_id = items.item_id)
//     WHERE 
//       history.history_id = ?
//   ";
//   return fetch_all_query($db, $sql, array($history_id));
// }

