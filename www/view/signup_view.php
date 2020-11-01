<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'signup.css'); ?>">
  <title>会員登録</title>
</head>
<body>
  <?php include VIEW_PATH . 'templates/header.php'; ?>
  <div class="container">
    <?php include VIEW_PATH . 'templates/messages.php'; ?>
    <h4>会員登録フォーム</h4>
    <form method="post" action="signup_process.php" class="signup_form mx-auto">
      <div class="form-group control-label">
        <label for="name">ユーザー名:（半角英数字6字以上）</label>
        <input type="text" name="name" id="name" class="form-control" value="<?php print h($name);?>">
      </div>
      <div class="blank">
      </div>
      <div class="form-group control-label">
        <label for="password">パスワード:（半角英数字6字以上） </label>
        <input type="password" name="password" id="password" class="form-control" value="<?php print h($password);?>">
        <input type="checkbox" id="password-check">
        パスワードを表示する 
      </div>
      <div class="blank">
      </div>
      <div class="form-group control-label">
        <label for="password_confirmation">パスワード（確認用）: </label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" value="<?php print h($password_confirmation);?>">
        <input type="checkbox" id="password-check-conf">
        パスワードを表示する 
      </div>
      <div class = "submit">
        <input type="submit" value="登録" class="btn btn-primary">
        <input type="hidden" name ="token"  value="<?php print h($token);?>" >
      </div>
    </form>
  </div>
  <script src ="<?php print (JAVASCRIPT_PATH . 'password.js'); ?>"></script>
</body>
</html>