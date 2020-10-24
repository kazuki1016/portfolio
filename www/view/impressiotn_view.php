<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.7.1/css/lightbox.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.7.1/js/lightbox.min.js" type="text/javascript"></script>

  <title>口コミ一覧</title>
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'admin.css'); ?>">
</head>
<style>
  .container{
    max-width: 900px;
  }
  .container h4, h6{
    padding: 30px 0;
    text-align: center;
  }
  .main_impression{
    margin-bottom:30px;
    border: thin solid grey;
    -moz-border-radius: 1em;
    -webkit-border-radius: 1em;
    -o-border-radius: 1em;
    -ms-border-radius: 1em;
  }

  .head{
    border-bottom: thin solid rgb(221, 221, 221);
  }
  .btn-primary{
    padding: 0.375rem 2.375rem;
  }
  .btn_impression{
    text-align: center;
    padding-bottom: 30px;
  }
  .table th{
    font-size: 15px;
  }
  .table img{
    max-width: 20%;
    display: inline-block;
  }
  .title{
    font-size: 30px;
    font-weight: bold;
  }
</style>
<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>
  <div class="container">
    <?php include VIEW_PATH . 'templates/messages.php'; ?>
    <h4><?php print h(get_session('shop_name'))?>の口コミ一覧</h4>
    <div class="btn_impression">
      <a class="btn btn-primary" href="article.php?shop_id=<?php print h($comments[0]['shop_id'])?>">口コミを投稿する</a>
    </div>
    <p>全<?php print h(count($comments)) ?>件</p>
    <?php if(count($comments)===0)  {?>
      <h6>口コミはまだ投稿されていません</h6>
    <?php } ?>
    <?php foreach($comments as $comment) {?>
      <div class="main_impression"> 
        <table class="table table-borderless">
          <tbody>
            <tr class="head">
              <th><?php print h($user['user_name']) ?>さんの口コミ</th>
            </tr>
            <tr>
              <th><?php print h($comment['comment_date']) ?>投稿</th>
            </tr>
            <tr>
              <td class="title"><u><?php print h($comment['comment_title']) ?></u></td>
            </tr>
            <tr>
              <td><?php print h($comment['comment_body']) ?></td>
            </tr>
            <tr>
              <td>
                <?php for($j=0; $j<count($comment['comment_images']); $j++) {?>
                  <a href="<?php print h(COMMENT_IMAGE_PATH . $comment['comment_images'][$j]['comment_image']) ?>" data-lightbox="group">
                    <img src="<?php print h(COMMENT_IMAGE_PATH . $comment['comment_images'][$j]['comment_image']) ?>">
                  </a>
                <?php } ?>
              </td>
            </tr>
        </tbody>
      </table>
    </div>
  <?php } ?>
  </div>
  <?php include VIEW_PATH . 'templates/footer.php'; ?>
</body>
</html>