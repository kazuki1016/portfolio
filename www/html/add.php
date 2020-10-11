<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'genre.php';
require_once MODEL_PATH . 'city.php';

session_start();

if(is_logined() === false){
  redirect_to(HOME_URL);
}

var_dump($_SESSION['user_id']);

$db = get_db_connect();
$user = get_login_user($db);
$token = get_csrf_token();

 
include_once VIEW_PATH . '/add_view.php';
