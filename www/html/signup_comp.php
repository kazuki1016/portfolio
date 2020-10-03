<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
// require_once MODEL_PATH . 'user.php';

// session_start();

// if(is_logined() === true){
//   redirect_to(HOME_URL);
// }

$name = get_post('name');
$password = get_post('password');




include_once VIEW_PATH . 'singup_comp_view.php';

