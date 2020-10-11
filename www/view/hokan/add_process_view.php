<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <title>会員登録</title>
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'signup.css'); ?>">
</head>
<style>
  .bottons{
    text-align: center;
  }
</style>
<body>
  <?php include VIEW_PATH . 'templates/header.php'; ?>
  <div class="container">
    <p>登録内容はこちらで宜しいでしょうか？よろしければ「登録する」ボタンを押して下さい。</p>
    <form method="post" action="add_comp.php" >
      <div class="form-group">
        <label class="control-label">店名（50字以内）</label>
        <input class="form-control" type="text" name="shop_name" value="<?php print h($shop_name);?>" readonly>
      </div>
      <div class="form-group">
        <label class="control-label">ジャンル</label>
        <input class="form-control" type="text" name="genre_name" value="<?php print h($genre_name);?>" readonly>
      </div>
      <div class="form-group">
        <label class="control-label">市町村</label>
        <input class="form-control" type="text" name="city_name" value="<?php print h($city_name);?>" readonly>
      </div>
      <div class="form-group">
        <label class="control-label">画像:<?php print h($image);?></label>
      </div>
      <div class="form-group">
        <label class="control-label">お店の詳細情報（200字以内）</label>
        <textarea name="shop_detail" class="form-control" cols="30" rows="5" readonly><?php print h($shop_detail);?> </textarea>
      </div>
      <div class="bottons">
        <input type="submit" value="登録" class="btn btn-primary">
        <input type="hidden" name ="token"  value="<?php print h($token);?>" >
        <input type="hidden" name ="genre"  value="<?php print h($genre_id);?>" >
        <input type="hidden" name ="city"  value="<?php print h($city_id);?>" >
      </div>
    </form>
    <div class="bottons">
      <form method="POST" action="add.php"><input type="submit" value="修正" class="btn btn-secondary"></form>
    </div>
  </div>
  <?php include VIEW_PATH . 'templates/footer.php'; ?>

</body>
</html>