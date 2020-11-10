<?php
require_once '../conf/const.php';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'mypage.css'); ?>">
  <title>マイページ</title>
</head>
<body>
<nav class="navbar navbar-expand-md  navbar-light bg-light">
  <a class="navbar-brand" href="/"><img src="images/webst8-logo.png" alt="WEBST8ロゴ"></a>
  <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#bs-navi" aria-controls="bs-navi" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
 
  <div class="collapse navbar-collapse" id="bs-navi">
    <ul class="navbar-nav">
      <li class="nav-item"><a class="nav-link" href="#">ホーム</a></li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          会社情報
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">経営理念</a>
          <a class="dropdown-item" href="#">会社概要</a>
          <a class="dropdown-item" href="#">アクセス</a>
          <a class="dropdown-item" href="#">採用情報</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
</body>
</html>
<?php if($user['user_name'] === "admin"){ ?>

<!-- 避難 -->
<div class="row main">
        <div class="col-7 nav__item">
          <li class="nav__item"><a href="mypage.php">お店管理ページ</a></li>
          <li class="nav__item"><a href="registuser_list.php">ユーザー管理ページ</a></li>
          <li class="nav__item"><a href="comment_list.php">口コミ管理ページ</a></li>
          <li class="nav__item"><a href="add.php">お店登録へ</a></li>
        </div>
      </div>
    <?php } else { ?>
      <h5><?php print h($user['user_name']); ?>さんのマイページ</h5>
      <div class="row main">
        <div class="col-7 nav__item">
          <li class="nav__item"><a href="mypage.php">マイページトップへ</a></li>
          <li class="nav__item"><a href="bookmark.php">お気に入り一覧へ</a></li>
          <li class="nav__item"><a href="add.php">お店登録へ</a></li>
        </div>
      </div>
    <?php } ?>
