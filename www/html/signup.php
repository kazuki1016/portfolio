<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';

session_start();

if(is_logined() === true){
  redirect_to(HOME_URL);
}

$name = get_session('name');
$password = get_session('password');
$password_confirmation = get_session('password_confirmation');
var_dump($_SESSION);

include_once VIEW_PATH . 'signup_view.php';



