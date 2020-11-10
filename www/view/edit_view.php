<!DOCTYPE html>
<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <title>お店編集</title>
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'edit.css'); ?>">
</head>
<style>
<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>

  <div class="container">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4><?php print h($edit_shop[0]['shop_name']) ?>の編集</h4>
        <?php include VIEW_PATH . 'templates/messages.php'; ?>
      </div>
      <div class="panel-body">
        <form method="post" action="edit_comp.php" enctype="multipart/form-data" class="signup_form mx-auto">
          <div class="form">
            <label class="control-label form-child">店名（50字以内、スペース含む）</label>
            <input class="form-control" type="text" name="shop_name" maxlength="50" value="<?php print h($edit_shop[0]['shop_name'])  ?>">
          </div>
          <div class="blank">
          </div>
          <div class="form">
            <label class="control-label">ジャンル</label>
            <div class="radio">
              <?php foreach($_SESSION['genres'] as $genre) { ?>
                <?php if($genre['genre_id'] === $edit_shop[0]['genre_id']) { ?>
                  <label><input type="radio" name="genre_id"  value="<?php print h($genre['genre_id']); ?>" checked> <?php print h($genre['genre_name']); ?></label>
                <?php } else { ?>
                  <label><input type="radio" name="genre_id"  value="<?php print h($genre['genre_id']); ?>"> <?php print h($genre['genre_name']); ?></label>
                <?php } ?>
              <?php } ?>
              </div>
          </div>
          <div class="blank">
          </div>
          <div class="form">
            <label class="control-label">お店のある市町村</label>
            <div>
              <select class="child" name="city_id">
                <option selected value="<?php print h($edit_shop[0]['city_id'])?>"><?php print h($edit_shop[0]['city_name'])?></option>
                <?php foreach($_SESSION['citys'] as $city) { ?>
                <option value="<?php print h($city['city_id']); ?>"><?php print h($city['city_name']); ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="blank">
          </div>
          <div class="form">
            <label class ="control-label">画像（違う画像を投稿するときは選択してください） </label>
            <div class="image">
              <input type="file" name="image" id="image">
            </div>
          </div>
          <div class="blank">
          </div>
          <div class="form">
            <label class ="control-label">現在の画像</label>
            <p>
              <img class="image_space" src="<?php print h(IMAGE_PATH . $edit_shop[0]['filename'])?>" title="現在の投稿画像">
            </p>
          </div>
          <div class="form">
            <label class="control-label">お店の詳細情報（600字以内、スペース含む）</label>
            <textarea name="shop_detail" class="form-control" maxlength="600" cols="30" rows="5"><?php print h($edit_shop[0]['shop_detail'])?></textarea>
          </div>
          <div class = "submit">
            <input type="submit" value="編集する" class="btn btn-primary">
          </div>
          <input type="hidden" name ="token"  value="<?php print h($token);?>" >
          <input type="hidden" name ="current_image"  value="<?php print h($edit_shop[0]['filename']);?>" >
          <input type="hidden" name ="shop_id"  value="<?php print h($edit_shop[0]['shop_id']);?>" >
        </form>
      </div>
    </div>
  </div>
  <?php include VIEW_PATH . 'templates/footer.php'; ?>
</body>
</html>