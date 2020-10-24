<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'shop.php';
// require_once MODEL_PATH . 'genre.php';
// require_once MODEL_PATH . 'city.php';

session_start();

// if(is_logined() === false){
//   redirect_to(HOME_URL);
// // }
// print('<pre>');
var_dump($_SESSION);
// print('<pre>');

$db = get_db_connect();
$token = get_csrf_token();
$user = get_login_user($db);
$genres = g($db);
$citys = get_citys($db);
$genre_number = get_shop_number_per_genre($db, $genre_id);

for($i=0; $i<count($genres); $i++){
  $genre_id = $genres[$i]['genre_id'];
  $shop_number_per_genres = get_shop_number_per_genre($db, $genre_id);
  foreach($shop_number_per_genres as $shop_number_per_genre){
    $genres[$i]['shop_number_per_genre'] = $shop_number_per_genre;
  }
}
for($i=0; $i<count($citys); $i++){
  $city_id = $citys[$i]['city_id'];
  $shop_number_per_citys = get_shop_number_per_city($db, $city_id);
  foreach($shop_number_per_citys as $shop_number_per_city){
    $citys[$i]['shop_number_per_city'] = $shop_number_per_city;
  }
}
set_session('genres', $genres);
set_session('citys', $citys);

// print('<pre>');
// var_dump($genres);
// print('<pre>');

// set_session('citys', get_citys($db));
// $citys = get_session('citys');
// $genres = get_session('genres');
// set_session('genre_numbers', $genre_numbers);
// $genre_numbers = get_session('genre_numbers');


include_once VIEW_PATH . 'index_view.php';