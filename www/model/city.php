<?php
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'db.php';

function get_citys($db){
  $sql = "
    SELECT
      *
    FROM
      citys
  ";

  return fetch_all_query($db, $sql);
}

