<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <title>会員登録入力確認</title>
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'signup_process.css'); ?>">
</head>
<body>
  <?php include VIEW_PATH . 'templates/header.php'; ?>
  <div class="container">
    <?php include VIEW_PATH . 'templates/messages.php'; ?>
    <h4>会員登録入力確認ページ</h4>
    <p>会員情報にお間違えないでしょうか？<br>よろしければ「登録」ボタンを押して下さい。</p>
    <form method="post" action="signup_comp.php" class="signup_form mx-auto">
      <div class="form-group control-label">
        <label for="name">ユーザー名:（半角英数字6字以上）</label>
        <input type="text" name="name" id="name" value="<?php print h($name);?>" class="form-control" readonly>
      </div>
      <div class="blank">
      </div>
      <div class="form-group control-label">
        <label for="password">パスワード:（半角英数字6字以上） </label>
        <input type="password" name="password" id="password" value="<?php print h($password);?>" class="form-control" readonly>
        <input type="checkbox" id="password-check">
        パスワードを表示する 
      <div class="blank">
      </div>
      <div class="form-group control-label">
        <label for="password_confirmation">パスワード:（確認用） </label>
        <input type="password" name="password_confirmation" id="password_confirmation" value="<?php print h($password_confirmation);?>" class="form-control" readonly>
        <input type="checkbox" id="password-check-conf">
        パスワードを表示する 
      </div>
      <div class = "submit">
        <input type="submit" value="登録" class="btn btn-primary">
        <input type="hidden" name ="token"  value="<?php print h($token);?>" >
        <a class="btn btn-secondary" href="<?php print(SIGNUP_URL);?>">修正</a>
      </div>
    </form>
  </div>
  <script src ="<?php print (JAVASCRIPT_PATH . 'password.js'); ?>"></script>
</body>
</html>