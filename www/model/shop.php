<?php
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'db.php';
require_once MODEL_PATH . 'genre.php';
require_once MODEL_PATH . 'city.php';

// DB利用

// function get_item($db, $item_id){
//   $sql = "
//     SELECT
//       item_id, 
//       name,
//       stock,
//       price,
//       image,
//       status
//     FROM
//       items
//     WHERE
//       item_id = ?
//   ";

//   return fetch_query($db, $sql, array($item_id));
// }

// function get_items($db, $is_open = false){
//   $sql = '
//     SELECT
//       item_id, 
//       name,
//       stock,
//       price,
//       image,
//       status
//     FROM
//       items
//   ';
//   if($is_open === true){
//     $sql .= '
//       WHERE status = 1
//       ORDER BY item_id DESC
//     ';
//   }
//   return fetch_all_query($db, $sql);
// }

// //並び替えのSQL
// function cheap_order_items($db){
//   $sql = '
//     SELECT
//       item_id, 
//       name,
//       stock,
//       price,
//       image,
//       status
//     FROM
//       items
//     WHERE status = 1
//     ORDER BY price ASC
//   ';
//   return fetch_all_query($db, $sql);
// }

// function expensive_order_items($db){
//   $sql = '
//     SELECT
//       item_id, 
//       name,
//       stock,
//       price,
//       image,
//       status
//     FROM
//       items
//     WHERE status = 1
//     ORDER BY price DESC
//   ';
//   return fetch_all_query($db, $sql);
// }

// function get_all_items($db){
//   return get_items($db);
// }

// function get_open_items($db){
//   return get_items($db, true);
// }

// お店情報登録関係
function regist_shop($db, $shop_name, $genre_id, $genre_ids, $city_id, $city_ids, $shop_detail, $image){
  $filename = get_upload_filename($image);
  if(validate_shop($shop_name, $genre_id, $genre_ids, $city_id, $city_ids, $shop_detail, $image) === false){
    return false;
  }
  return regist_shop_transaction($db, $shop_name, $genre_id, $city_id, $shop_detail, $image, $filename);
}

function regist_shop_transaction($db, $shop_name, $genre_id, $city_id, $shop_detail, $image, $filename){
  $db->beginTransaction();
  if(insert_shop($db, $shop_name, $genre_id, $city_id, $shop_detail, $filename) 
    && save_image($image, $filename)){
    $db->commit();
    return true;
  }
  $db->rollback();
  return false;
  
}

function insert_shop($db, $shop_name, $genre_id, $city_id, $filename, $shop_detail){
    $sql = "
      INSERT INTO
        shops(
          shop_name,
          genre_id,
          city_id,
          filename,
          shop_detail,
        )
      VALUES(?, ?, ?, ?, ?);
    ";
    return execute_query($db, $shop_name, $genre_id, $city_id, $filename, $shop_detail);
}
// ここまでお店情報登録関係

// function update_item_status($db, $item_id, $status){
//     $sql = "
//       UPDATE
//         items
//       SET
//         status = ?
//       WHERE
//         item_id = ?
//       LIMIT 1
//     ";
//     return execute_query($db, $sql, array($status, $item_id));
// }

// // SQLインジェクション対策としてステートメントに値をバインドする形式
// function update_item_stock($db, $item_id, $stock){
//     $sql = "
//       UPDATE
//         items
//       SET
//         stock = ?
//       WHERE
//         item_id = ?
//       LIMIT 1
//     ";
//     return execute_query($db, $sql, array($stock, $item_id));
//   }
  

// function destroy_item($db, $item_id){
//   $item = get_item($db, $item_id);
//   if($item === false){
//     return false;
//   }
//   $db->beginTransaction();
//   if(delete_item($db, $item['item_id'])
//     && delete_image($item['image'])){
//     $db->commit();
//     return true;
//   }
//   $db->rollback();
//   return false;
// }

// function delete_item($db, $item_id){
//   $sql = "
//     DELETE FROM
//       items
//     WHERE
//       item_id = ?
//     LIMIT 1;
//   ";
  
//   return execute_query($db, $sql, array($item_id));
// }


// 非DB

// function is_open($item){
//   return $item['status'] === 1;
// }

function validate_shop($shop_name, $genre_id, $genre_ids, $city_id, $city_ids, $filename, $shop_detail){
  $is_valid_shop_name = is_valid_shop_name($shop_name);
  $is_valid_genre_id = is_valid_genre_id($genre_id, $genre_ids);
  $is_valid_city_id = is_valid_city_id($city_id, $city_ids);
  $is_valid_filename = is_valid_filename($filename);
  $is_valid_shop_detail = is_valid_shop_detail($shop_detail);

  return $is_valid_shop_name
    && $is_valid_genre_id
    && $is_valid_city_id
    && $is_valid_filename
    && $is_valid_shop_detail;
}

// 店名のバリデーション
function is_valid_shop_name($shop_name){
  $is_valid = true;
  if(is_valid_length($shop_name, SHOP_NAME_LENGTH_MIN, SHOP_NAME_LENGTH_MAX) === false){
    set_error('店名は'. SHOP_NAME_LENGTH_MIN . '文字以上、' . SHOP_NAME_LENGTH_MAX . '文字以内にしてください。');
    $is_valid = false;
  }
  return $is_valid;
}

// ジャンルIDのバリデーション
function is_valid_genre_id($genre_id, $genre_ids){
  $is_valid = true;
  if(in_array($genre_id, $genre_ids) === false){
    set_error('不正なジャンル値です');
    $is_valid = false;
  }
  return $is_valid;
}

// 市町村IDのバリデーション
function is_valid_city_id($city_id, $city_ids){
  $is_valid = true;
  if(in_array($city_id, $city_ids) === false){
    set_error('不正な市町村値です');
    $is_valid = false;
  }
  return $is_valid;
}

function is_valid_filename($filename){
  $is_valid = true;
  if($filename === ''){
    $is_valid = false;
  }
  return $is_valid;
}

// 詳細のバリデーション
function is_valid_shop_detail($shop_detail){
  $is_valid = true;
  if(is_valid_length($shop_detail, SHOP_DETAIL_LENGTH_MIN, SHOP_DETAIL_LENGTH_MAX) === false){
    set_error('お店情報は'. SHOP_DETAIL_LENGTH_MIN . '文字以上、' . SHOP_DETAIL_LENGTH_MAX . '文字以内にしてください。');
    $is_valid = false;
  }
  return $is_valid;
}
