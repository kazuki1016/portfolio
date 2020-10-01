<?php
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'db.php';

function g($db){
  $sql = "
    SELECT
      *
    FROM
      genres
  ";

  return fetch_all_query($db, $sql);
}
