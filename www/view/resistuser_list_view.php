<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'mypage.css'); ?>">
  <title>ユーザ一管理ページ</title>
</head>
<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>
  <div class="container " >
  <?php include VIEW_PATH . 'templates/messages.php'; ?>
    <h5>お店管理ページ</h5>
    <div class="row main">
      <div class="col-7 nav__item">
        <li class="nav__item"><a href="mypage.php">お店管理ページ</a></li>
        <li class="nav__item"><a href="registuser_list.php">ユーザー管理ページ</a></li>
        <li class="nav__item"><a href="comment_list.php">口コミ管理ページ</a></li>
        <li class="nav__item"><a href="add.php">お店登録へ</a></li>
      </div>
    </div>
    <div class="main_border">
      <p>ユーザー一覧</p>
    </div>
    <?php if(count($user_lists) === 0) { ?>
      <p>まだ登録されていません</p>
    <?php } else { ?>
      <p>登録ユーザー数：<?php print h(count($user_lists))  ?></p>
      <table class="table table-borderless">
        <thead>
          <tr class="table_head">
            <th>ユーザーID</th>
            <th>ユーザー名</th>
            <th>登録日</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($user_lists as $user_list){?>
            <tr class="border-bottom">
              <td class="align-middle shop_list"><?php print h($user_list['user_id'])?></td>
              <td><?php print h($user_list['user_name'])?></td>
              <td><?php print h($user_list['create_date'])?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    <?php } ?>
  </div>  
</body>
<?php include VIEW_PATH . 'templates/footer.php'; ?>
</html>