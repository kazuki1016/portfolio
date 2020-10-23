<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <title>ログイン</title>
  <link rel="stylesheet" href="css/login.css">

</head>
<body>
  <?php include VIEW_PATH . 'templates/header.php'; ?>
  <div class="container">
    <h3>ログイン</h3>
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
      </div>
      <div class="blank">
      </div>
      <input type="submit" value="ログイン" class="btn btn-primary">
      <!-- クロスサイトリクエストフォージェリ対策、生成したトークンを遷移先へ送る -->
      <input type="hidden" name ="token"  value="<?php print h($token);?>" >
    </form>
  </div>
</body>
</html>