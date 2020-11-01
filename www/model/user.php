<?php
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'db.php';

function get_user($db, $user_id){
  $sql = "
    SELECT
      user_id, 
      user_name,
      pass
    FROM
      userinfo
    WHERE
      user_id = ?
    LIMIT 1
  ";

  return fetch_query($db, $sql, array($user_id));
}

function get_user_by_name($db, $name){
  $sql = "
    SELECT
      user_id, 
      user_name,
      pass
    FROM
      userinfo
    WHERE
      user_name = ?
    LIMIT 1
  ";

  return fetch_query($db, $sql, array($name));
}
function get_registed_names($db){
  $sql = "
    SELECT
      user_name
    FROM
      userinfo
  ";

  return fetch_column_query($db, $sql);
}

function login_as($db, $name, $password){
  $user = get_user_by_name($db, $name);
  if($user === false || $user['pass'] !== $password){
    return false;
  }
  set_session('user_id', $user['user_id']);
  return $user;
}

function get_login_user($db){
  $login_user_id = get_session('user_id');

  return get_user($db, $login_user_id);
}

function regist_user($db, $name, $registed_names, $password, $password_confirmation) {
  if( is_valid_user($name, $registed_names, $password, $password_confirmation) === false){
    return false;
  }
  
  return insert_user($db, $name, $password);
}


function is_valid_user($name, $registed_names, $password, $password_confirmation){
  // 短絡評価を避けるため一旦代入。
  $is_valid_user_name = is_valid_user_name($name, $registed_names);
  $is_valid_password = is_valid_password($password, $password_confirmation);
  return $is_valid_user_name && $is_valid_password ;
}

function is_valid_user_name($name, $registed_names) {
  $is_valid = true;
  if(is_valid_length($name, USER_NAME_LENGTH_MIN, USER_NAME_LENGTH_MAX) === false){
    set_error('ユーザー名は'. USER_NAME_LENGTH_MIN . '文字以上、' . USER_NAME_LENGTH_MAX . '文字以内にしてください。');
    $is_valid = false;
  }
  if(is_alphanumeric($name) === false){
    set_error('ユーザー名は半角英数字で入力してください。');
    $is_valid = false;
  }
  if(in_array($name, $registed_names) === true){
    set_error('既に登録済みのユーザー名です。');
    $is_valid = false;
  }
  return $is_valid;
}

function is_valid_password($password, $password_confirmation){
  $is_valid = true;
  if(is_valid_length($password, USER_PASSWORD_LENGTH_MIN, USER_PASSWORD_LENGTH_MAX) === false){
    set_error('パスワードは'. USER_PASSWORD_LENGTH_MIN . '文字以上、' . USER_PASSWORD_LENGTH_MAX . '文字以内にしてください。');
    $is_valid = false;
  }
  if(is_alphanumeric($password) === false){
    set_error('パスワードは半角英数字で入力してください。');
    $is_valid = false;
  }
  if($password !== $password_confirmation){
    set_error('パスワードがパスワード(確認用)と一致しません。');
    $is_valid = false;
  }
  return $is_valid;
}

// SQLインジェクション対策としてステートメントに値をバインドする形式
function insert_user($db, $name, $password){
  $sql = "
    INSERT INTO
      userinfo(user_name, pass)
    VALUES (?, ?);
  ";

  return execute_query($db, $sql, array($name, $password));
}

