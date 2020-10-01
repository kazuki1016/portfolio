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
      </div>
      <div class="panel-body">
        <form>
          <div class="form-group">
            <label class="control-label">店名</label>
            <input class="form-control" type="text" name="name">
          </div>
          <div class="form-group">
            <label class="control-label">ジャンル</label>
            <div class="radio">
              <?php foreach($genres as $genre) { ?>
                <label><input type="radio" name="genre" value="<?php print h($genre['genre_id']); ?>"> <?php print h($genre['genre_name']); ?></label>
              <?php } ?>
              </div>
          </div>
          <div class="form-group">
            <select class="child" name="city">
              <option disabled selected>市町村を選択してください</option>
              <?php foreach($citys as $city) { ?>
              <option value="<?php print h($city['city_id']); ?>"><?php print h($city['city_name']); ?></option>
              <?php } ?>
            </select>
          </div>

          <div class="form-group">
            <label for="image">画像: </label>
            <input type="file" name="image" id="image">
          </div>
          <input type="submit" value="登録" class="btn btn-primary">
        </form>
      </div>
    </div>
  </div>

</body>
</html>