<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'bookmark.css'); ?>">
  <title>ブックマーク</title>
</head>
<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>
  <div class="container" >
    <?php include VIEW_PATH . 'templates/messages.php'; ?>
    <div class="row main">
      <div class="col-7 nav__item">
          <li class="nav__item"><a href="mypage.php">マイページトップへ</a></li>
          <li class="nav__item"><a href="bookmark.php">お気に入り一覧へ</a></li>
          <li class="nav__item"><a href="add.php">お店登録へ</a></li>
      </div>
    </div>
    <div class="main_border">
      <h5>「<?php print h($user['user_name'])?>」さんのお気に入り一覧</h5>
    </div>
    <table class="table table-borderless">
      <thead>
        <tr class="table_head">
          <th>店名</th>
          <th class="text-center">ジャンル/市町村</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($bookmark_lists as $bookmark_list){?>
        <tr>
          <td class="align-middle shop_list">
            <a href="shop.php?shop_id=<?php print h($bookmark_list['shop_id'])?>"><?php print h($bookmark_list['shop_name'])?></a>
          </td>
          <td class="align-middle text-center genre_city">
            <a href="shop_genre_list.php?genre_id=<?php print h($bookmark_list['genre_id'])?>"><?php print h($bookmark_list['genre_name'])?></a>/
            <a href="shop_city_list.php?city_id=<?php print h($bookmark_list['city_id'])?>"><?php print h($bookmark_list['city_name'])?></a>              
          </td>
          <td>
            <div class="delite">
              <form method="POST" action="bookmark_delite.php">
                <input type="submit" value="お気に入りから削除" class="btn btn-secondary btn_mypage">
                <input type="hidden" name="shop_id" value="<?php print h($bookmark_list['shop_id'])?>">
              </form>
            </div>
          </td>
          <td>

          </td>
        </tr>
        <tr class="border-bottom ">
          <td class="align-top detail" colspan="2"><?php print (nl2br(h($bookmark_list['shop_detail']))) ?></td>
          <td><img src="<?php print h(IMAGE_PATH . $bookmark_list['filename'])?>"></td>
        </tr>            
        <?php } ?>
      </tbody>
    </table>
  </div>
  
</body>
<?php include VIEW_PATH . 'templates/footer.php'; ?>
</html>