<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'shop.php';

session_start();

$db = get_db_connect();
$user = get_login_user($db);
$shops = get_all_shop_data($db);

include_once VIEW_PATH . 'shop_list_view.php';
