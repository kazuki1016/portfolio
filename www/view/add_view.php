<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <title>お店追加</title>
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'admin.css'); ?>">
</head>
<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>

  <div class="container">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h2>あなたの知ってるお店情報を入力してください！</h2>
        <?php include VIEW_PATH . 'templates/messages.php'; ?>
      </div>
      <div class="panel-body">
        <form method="post" action="add_comp.php" class="signup_form mx-auto">
          <div class="form-group">
            <label class="control-label">店名（50字以内）</label>
            <input class="form-control" type="text" name="shop_name">
          </div>
          <div class="form-group">
            <label class="control-label">ジャンル</label>
            <div class="radio">
              <?php foreach($_SESSION['genres'] as $genre) { ?>
                <label><input type="radio" name="genre_id" value="<?php print h($genre['genre_id']); ?>"> <?php print h($genre['genre_name']); ?></label>
              <?php } ?>
              </div>
          </div>
          <div class="form-group">
            <label class="control-label">お店のある市町村</label>
            <div>
              <select class="child" name="city">
                <option disabled selected>市町村を選択してください</option>
                <?php foreach($_SESSION['citys'] as $city) { ?>
                <option value="<?php print h($city['city_id']); ?>"><?php print h($city['city_name']); ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="image">画像: </label>
            <input type="file" name="image" id="image">
          </div>
          <div class="form-group">
            <label class="control-label">お店の詳細情報（200字以内）</label>
            <textarea name="shop_detail" class="form-control" cols="30" rows="5"></textarea>
          </div>

          <input type="submit" value="登録" class="btn btn-primary">
          <input type="hidden" name ="token"  value="<?php print h($token);?>" >
          <input type="hidden" name ="genre_id"  value="<?php print h($genre['genre_id']);?>" >
          <input type="hidden" name ="city_id"  value="<?php print h($city['city_id']);?>" >
        </form>
      </div>
    </div>
  </div>
  <?php include VIEW_PATH . 'templates/footer.php'; ?>
</body>
</html>