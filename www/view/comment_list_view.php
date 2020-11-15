<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'comment_list.css'); ?>">
  <title>口コミ管理ページ</title>
</head>
<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>
  <div class="container " >
    <h5>口コミ管理ページ</h5>
    <?php include VIEW_PATH . 'templates/header_mypage.php'; ?>
    <div class="main_border">
      <p>口コミ一覧</p>
    </div>
    <?php if(count($comment_lists) === 0) { ?>
      <p>まだ口コミはありません</p>
    <?php } else { ?>
      <p>総口コミ数：<?php print h(count($comment_lists))  ?></p>
      <table class="table table-borderless">
        <thead>
          <tr class="table_head">
            <th>コメントID</th>
            <th>題名</th>
            <th>店名</th>
            <th>投稿者名</th>
            <th>投稿日</th>
            <th>更新日</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($comment_lists as $comment_list){?>
            <tr class="border-bottom">
              <td class="comment_id"><?php print h($comment_list['comment_id'])?></td>
              <td class="comment_title"><?php print h($comment_list['comment_title'])?></td>
              <td class="comment_shop_name"><?php print h($comment_list['shop_name'])?></td>
              <td class="comment_user_name"><?php print h($comment_list['user_name'])?></td>
              <td class="comment_date"><?php print h($comment_list['create_date'])?></td>
              <td class="comment_date"><?php print h($comment_list['update_date'])?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    <?php } ?>
  </div>  
</body>
<?php include VIEW_PATH . 'templates/footer.php'; ?>
</html>