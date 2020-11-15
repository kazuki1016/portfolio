<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.7.1/css/lightbox.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'impression.css'); ?>">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.7.1/js/lightbox.min.js" type="text/javascript"></script>
  <title>口コミ一覧</title>
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'admin.css'); ?>">
</head>
<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>
  <div class="container">
    <?php include VIEW_PATH . 'templates/messages.php'; ?>
    <h4><?php print h(get_session('shop_name'))?>の口コミ一覧</h4>
    <div class="btn_impression">
      <?php if(is_logined()){ ?>
        <a class="btn btn-primary" href="article.php?shop_id=<?php print h($comments[0]['shop_id'])?>">口コミを投稿する</a>
      <?php } else { ?>
        <a class="btn btn-primary" href="article.php?shop_id=<?php print h($comments[0]['shop_id'])?>">口コミを投稿する(投稿するにはログインしてください)</a>
      <?php } ?>
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
              <th><?php print h($comment['user_name']) ?>さんの口コミ</th>
            </tr>
            <tr>
              <th><?php print h($comment['comment_date']) ?>投稿</th>
            </tr>
            <tr>
              <td class="title"><u><?php print h($comment['comment_title']) ?></u></td>
            </tr>
            <tr>
              <td><?php print (nl2br(h($comment['comment_body']))) ?></td>  
              <!-- 改行を維持しつつエスケープ処理を行う（順番に注意） -->
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