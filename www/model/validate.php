<?php

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

// IDのバリデーション
function is_valid_id($value, $values){
  $is_valid = true;
  if(in_array($value, $values) === false){
    set_error('登録されていない値が渡されました');
    $is_valid = false;
  }
  return $is_valid;
}
// 登録者のバリデーション
function is_valid_user_id($user_id){
  $is_valid = true;
  if(is_positive_integer($user_id) === false){
    set_error('不正なユーザーです');
    $is_valid = false;
  }
  return $is_valid;
}

// 投稿画像のバリデーション
function is_valid_filename($filename){
  $is_valid = true;
  if($filename === ''){
    $is_valid = false;
  }
  return $is_valid;
}

// お店のバリデーション
function is_valid_shop_id($shop_id){
  $is_valid = true;
  if(is_positive_integer($shop_id) === false){
    set_error('登録されていないお店です');
    $is_valid = false;
  }
  return $is_valid;
}


// 詳細のバリデーション
function is_valid_shop_detail($shop_detail){
  $is_valid = true;
  if(is_valid_length($shop_detail, SHOP_DETAIL_LENGTH_MIN, SHOP_DETAIL_LENGTH_MAX) === false){
    set_error('お店情報は'. SHOP_DETAIL_LENGTH_MIN . '文字以上、' . SHOP_DETAIL_LENGTH_MAX . '文字以内にしてください。（スペースもカウントします）');
    $is_valid = false;
  }
  return $is_valid;
}

// 題名のバリデーション
function is_valid_comment_title($comment_title){
  $is_valid = true;
  if(is_valid_length($comment_title, COMMENT_TITLE_LENGTH_MIN, COMMENT_TITLE_LENGTH_MAX) === false){
    set_error('題名は'. COMMENT_TITLE_LENGTH_MIN . '文字以上、' . COMMENT_TITLE_LENGTH_MAX . '文字以内にしてください。');
    $is_valid = false;
  }
  return $is_valid;
}

// 本文のバリデーション
function is_valid_comment_body($comment_body){
  $is_valid = true;
  if(is_valid_length($comment_body, COMMENT_BODY_LENGTH_MIN, COMMENT_BODY_LENGTH_MAX) === false){
    set_error('本文は'. COMMENT_BODY_LENGTH_MIN . '文字以上、' . COMMENT_BODY_LENGTH_MAX . '文字以内にしてください。');
    $is_valid = false;
  }
  return $is_valid;
}

