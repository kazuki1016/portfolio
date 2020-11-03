<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'shop.php';

session_start();

if(is_logined() === false){
  redirect_to(HOME_URL);
}

$db = get_db_connect();
$token = get_post('token');
if (is_valid_csrf_token($token) === false ){
  set_error('不正アクセスです');
  redirect_to(HOME_URL);
}

$shop_name = get_post('shop_name');
$genre_id = get_post('genre_id');
$city_id = get_post('city_id');
$image = get_file('image');
$current_image = get_post('current_image');
$shop_detail = get_post('shop_detail');
$shop_id = get_post('shop_id');

$genre_ids = array();
// ジャンルIDの取得
foreach($_SESSION['genres'] as $genre_id_array) {
  $genre_ids[] = $genre_id_array['genre_id'];
}
// 市町村IDの取得
$city_ids = array();
foreach($_SESSION['citys'] as $city_id_array) {
  $city_ids[] = $city_id_array['city_id'];
}

//登録されているお店idを取得する
$shop_ids = get_shop_id($db);

//画像が新たにアップデートされなければ画像以外を更新。新たに画像がアップロードされれば更新して元の画像は削除
if(empty($image['name'])){  //$imageにはすでに配列が入っているのでその中の1つの['name']を指定して空かどうか判別
  if(change_shop_text_data($db, $shop_name, $genre_id, $genre_ids, $city_id, $city_ids, $shop_detail, $shop_id, $shop_ids) ){
    set_message('編集が完了しました。');
    redirect_to(MYPAGE_URL);
  } else{
    set_error('編集に失敗しました。');
    redirect_to(EDIT_URL.'?shop_id=' . $shop_id);
  } 
} else {
  $db->beginTransaction();
    if(change_shop_full_data($db, $shop_name, $genre_id, $genre_ids, $city_id, $city_ids, $shop_detail, $image, $shop_id, $shop_ids)
      && file_exists(IMAGE_DIR.$current_image)){
      if(unlink(IMAGE_DIR.$current_image)){
        $db->commit();
        set_message('編集が完了しました。');
        redirect_to(MYPAGE_URL);
      } else {
        $db->rollback();
        set_error('画像削除ができません。管理者にお問い合わせください。');
      }
    } else{
      $db->rollback();
      set_error('編集に失敗しました。');
      redirect_to(EDIT_URL.'?shop_id=' . $shop_id);
    }
}






