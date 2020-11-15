<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';

session_start();

if(is_logined() === true){
  redirect_to(HOME_URL);
}

//postされた値を一度セッションに格納
set_session('name', get_post('name'));
set_session('password', get_post('password'));
set_session('password_confirmation', get_post('password_confirmation'));
$name = get_session('name');
$password = get_session('password');
$password_confirmation = get_session('password_confirmation');
$token = get_csrf_token();

include_once VIEW_PATH . 'signup_process_view.php';
