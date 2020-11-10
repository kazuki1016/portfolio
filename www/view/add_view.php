<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <title>お店追加</title>
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'add.css'); ?>">
</head>
<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>

  <div class="container">
    <div class="panel panel-default">
      <div class="panel-heading">
        <?php include VIEW_PATH . 'templates/messages.php'; ?>
        <h4>あなたの知ってるお店情報を入力してください！</h4>
      </div>
      <div class="panel-body">
        <form method="post" action="add_comp.php" enctype="multipart/form-data" class="signup_form mx-auto">
          <div class="form">
            <label class="control-label form-child">店名（50字以内、スペース含む）</label>
            <input class="form-control" type="text" name="shop_name">
          </div>
          <div class="blank">
          </div>
          <div class="form">
            <label class="control-label">ジャンル</label>
            <div class="radio">
              <?php foreach($_SESSION['genres'] as $genre) { ?>
                <label><input type="radio" name="genre_id" value="<?php print h($genre['genre_id']); ?>"> <?php print h($genre['genre_name']); ?></label>
              <?php } ?>
              </div>
          </div>
          <div class="blank">
          </div>
          <div class="form">
            <label class="control-label">お店のある市町村</label>
            <div>
              <select class="child" name="city_id">
                <option disabled selected>市町村を選択してください</option>
                <?php foreach($_SESSION['citys'] as $city) { ?>
                <option value="<?php print h($city['city_id']); ?>"><?php print h($city['city_name']); ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="blank">
          </div>
          <div class="form">
            <label class ="control-label">画像 </label>
            <div class="image">
              <input type="file" name="image" id="image">
            </div>
          </div>
          <div class="blank">
          </div>
          <div class="form">
            <label class="control-label">お店の詳細情報（600字以内、スペース含む）</label>
            <textarea name="shop_detail" class="form-control" cols="30" rows="5"></textarea>
          </div>
          <div class = "submit">
            <input type="submit" value="登録" class="btn btn-primary">
          </div>
          <input type="hidden" name ="token"  value="<?php print h($token);?>" >
          <input type="hidden" name ="user_id"  value="<?php print h($_SESSION['user_id']);?>" >
        </form>
      </div>
    </div>
  </div>
  <?php include VIEW_PATH . 'templates/footer.php'; ?>
</body>
</html>