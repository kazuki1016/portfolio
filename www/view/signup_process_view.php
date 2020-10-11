<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <title>会員登録</title>
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'signup.css'); ?>">
</head>
<body>
  <?php include VIEW_PATH . 'templates/header.php'; ?>
  <div class="container" style="text-align: center; margin-top: 30px;">
    <div class="container">
      <?php include VIEW_PATH . 'templates/messages.php'; ?>
      <h1>登録内容確認</h1>
      <p>お問い合わせ内容はこちらで宜しいでしょうか？<br>よろしければ「送信する」ボタンを押して下さい。</p>
      <form method="post" action="signup_comp.php" class="signup_form mx-auto">
        <div class="form-group">
          <label for="name">ユーザー名 </label>
          <input type="text" name="name" id="name" value="<?php print h($name);?>" class="form-control" readonly>
        </div>
        <div class="form-group">
          <label for="password">パスワード </label>
          <input type="password" name="password" id="password" value="<?php print h($password);?>" class="form-control" readonly>
        </div>
        <input type="submit" value="登録" class="btn btn-primary">
        <input type="hidden" name="name" value="<?php print h($name);?>">
        <input type="hidden" name="password" value="<?php print h($password);?>">
        <input type="hidden" name ="password_confirmation"  value="<?php print h($password_confirmation);?>" >
        <input type="hidden" name ="token"  value="<?php print h($token);?>" >
      </form>
      <a class="btn btn-secondary" href="signup.php" role="button" >修正</a>
  </div>      
  </div>
</body>
</html>