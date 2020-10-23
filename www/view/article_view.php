<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <title>口コミ投稿</title>
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'admin.css'); ?>">
</head>
<style>
  label{
    margin-bottom:none;
  }
  h4{
    padding:30px 0;
    text-align: center;
  }
  .blank{
    padding-bottom: 20px;
  }
  .submit{
    text-align: center;
    margin-top: 20px;
  }
  .btn-primary{
    padding: 0.375rem 5.375rem;
  }
  .control-label{
    padding-left: 0.5em;
    border-left: solid 0.7em palevioletred;    
  }
</style>
<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>

  <div class="container">
    <div class="panel panel-default">
      <div class="panel-heading">
      <?php include VIEW_PATH . 'templates/messages.php'; ?>
      <h4><?php print h($shop[0]['shop_name'])?>の口コミ投稿</h4>
      </div>
      <div class="panel-body">
        <form method="POST" action="article_comp.php" enctype="multipart/form-data" class="signup_form mx-auto">
          <div class="form">
            <label class="control-label form-child">題名（50字以内）</label>
            <input class="form-control" type="text" name="comment_title">
          </div>
          <div class="blank">
          </div>
          <div class="form">
            <label class ="control-label">画像があったら投稿してください!（複数可能） </label>
            <div class="image">
              <input type="file" name="comment_images[]" multiple id="image" accept="image/*">
            </div>
          </div>
          <div class="blank">
          </div>
          <div class="form">
            <label class="control-label">本文（600字以内）</label>
            <textarea name="comment_body" class="form-control" cols="30" rows="5"></textarea>
          </div>
          <div class = "submit">
            <input type="submit" value="口コミ投稿" class="btn btn-primary">
          </div>
          <input type="hidden" name ="token"  value="<?php print h($token);?>" >
        </form>
      </div>
    </div>
  </div>
  <?php include VIEW_PATH . 'templates/footer.php'; ?>
</body>
</html>