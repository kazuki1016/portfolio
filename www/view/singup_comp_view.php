<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <title>会員登録</title>
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'signup.css'); ?>">
</head>
<body>
  <?php include VIEW_PATH . 'templates/header.php'; ?>
  <div class="container" style="text-align: center;">
  <?php include VIEW_PATH . 'templates/messages.php'; ?>

    <h1>登録ありがとうございます！</h1>
    <div class="form-group">
        <p>ユーザー名:<?php print h($name);?> </p>
        <p>で登録しました！</p>

  </div>
</body>
</html>