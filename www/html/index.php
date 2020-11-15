<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'shop.php';

session_start();

$db = get_db_connect();
$token = get_csrf_token();
$user = get_login_user($db);
$user_id = get_session('user_id');

//ユーザーが登録したshop_idを取得してセッションに登録
$my_shoplists = get_my_shoplist($db, $user_id);
for($i=0; $i<count($my_shoplists); $i++){
  $my_shoplists_ids[] = $my_shoplists[$i]['shop_id'];
}
set_session('my_shoplists_ids', $my_shoplists_ids);

//ユーザーがブックマーク済みのshop_idを取得してセッションに登録
$bookmark_lists = get_bookmark_list($db, $user_id); //データベースからユーザーのお気に入り一覧を取得
for($i=0; $i<count($bookmark_lists); $i++){
  $bookmarked_shop_ids[] = $bookmark_lists[$i]['shop_id'];
}
set_session('bookmarked_shop_ids', $bookmarked_shop_ids);

// 各ジャンルのお店の数をカウントしたものを$genres格納してセッションに追加。
$genres = g($db); //データベースからジャンル一覧を取得
for($i=0; $i<count($genres); $i++){
  $genre_id = $genres[$i]['genre_id'];
  $shop_number_per_genres = get_shop_number_per_genre($db, $genre_id);
  foreach($shop_number_per_genres as $shop_number_per_genre){
    $genres[$i]['shop_number_per_genre'] = $shop_number_per_genre;
  }
}
set_session('genres', $genres);

// 各市町村のお店の数をカウントしたものを$cityに格納してセッションに追加。
$citys = get_citys($db);  //データベースから市町村一覧を取得
for($i=0; $i<count($citys); $i++){
  $city_id = $citys[$i]['city_id'];
  $shop_number_per_citys = get_shop_number_per_city($db, $city_id);
  foreach($shop_number_per_citys as $shop_number_per_city){
    $citys[$i]['shop_number_per_city'] = $shop_number_per_city;
  }
}
set_session('citys', $citys);
 
//新着の店名と画像を取得する
$new_shops = get_new_shops($db);
// トピックスのお店情報(コメントが多いお店)を取得する
$topic_shops = get_topic_shop_data($db);

include_once VIEW_PATH . 'index_view.php';