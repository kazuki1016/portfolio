<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <link rel="stylesheet" href="<?php print (STYLESHEET_PATH .'login.css'); ?>">
  <title>ログイン</title>
</head>
<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>
  <div class="container">
    <h4>登録した名前とパスワードを入力してください</h4>
    <?php include VIEW_PATH. 'templates/messages.php'; ?>
    <form method="post" action="login_process.php" class="login_form mx-auto">
      <div class="form-group control-label">
        <label for="name">名前: </label>
        <input type="text" name="name" id="name" class="form-control">
      </div>
      <div class="blank">
      </div>
      <div class="form-group control-label">
        <label for="password">パスワード: </label>
        <input type="password" name="password" id="password" class="form-control">
        <input type="checkbox" id="password-check">
        パスワードを表示する 
      </div>
      <div class="blank">
      </div>
      <div class = "submit">
        <input type="submit" value="ログイン" class="btn btn-primary">
        <input type="hidden" name ="token"  value="<?php print h($token);?>" >
      </div>
    </form>
  </div>
  <script src ="<?php print (JAVASCRIPT_PATH . 'password.js'); ?>"></script>
</body>
</html>