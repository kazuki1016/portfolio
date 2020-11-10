<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'mypage.css'); ?>">
  <title>マイページ</title>
</head>
<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>
  <div class="container">
    <?php include VIEW_PATH . 'templates/messages.php'; ?>
      <h5>お店管理ページ</h5>
      <?php include VIEW_PATH . 'templates/header_mypage.php'; ?>
    <div class="main_border">
      <h5>投稿したお店</h5>
    </div>
    <?php if(count($my_shoplists)===0) { ?>
      <p>登録したお店はまだありません</p>
    <?php } else { ?>
      <table class="table table-borderless table-responsive-xl" >
        <thead>
          <tr class="table_head">
            <th>店名</th>
            <th class="genre_city">ジャンル/市町村</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($my_shoplists as $my_shoplist){?>
            <tr>
              <td class="shop_list">
                <a href="shop.php?shop_id=<?php print h($my_shoplist['shop_id'])?>"><?php print h($my_shoplist['shop_name'])?></a>
              </td>
              <td class="genre_city">
                <a href="shop_genre_list.php?genre_id=<?php print h($my_shoplist['genre_id'])?>"><?php print h($my_shoplist['genre_name'])?></a>/
                <a href="shop_city_list.php?city_id=<?php print h($my_shoplist['city_id'])?>"><?php print h($my_shoplist['city_name'])?></a>
              </td>
              <td>
              </td>
            </tr>
            <tr>
              <td class="detail" colspan="2"><?php print (nl2br(h($my_shoplist['shop_detail']))) ?></td>
              <td>
                <div class="image_space">
                  <img src="<?php print h(IMAGE_PATH . $my_shoplist['filename'])?>">
                </div>
              </td>
              <td>
                <a class="btn btn-primary btn_mypage" href="edit_shop.php?shop_id=<?php print h($my_shoplist['shop_id']);?>">編集する</a>         
                <?php if(in_array($my_shoplist['shop_id'], $_SESSION['bookmarked_shop_ids'])===false) {?>   <!--既にお気に入り済みならお気に入りボタンを表示させない  -->
                  <a class="btn btn-success btn_mypage" href="bookmark.php?shop_id=<?php print h($my_shoplist['shop_id']);?>">お気に入りへ</a>         
                <?php } ?>
                <form method="GET" action="shop_delete.php">
                  <input type="submit" class="btn btn-secondary btn_mypage" value="削除" >         
                  <input type="hidden" name="shop_id" value="<?php print h($my_shoplist['shop_id']);?>">         
                  <input type="hidden" name="filename" value="<?php print h($my_shoplist['filename'])?>">         
                </form>
              </td>
            </tr>            
          <?php } ?>
        </tbody>
      </table>
    <?php } ?>
  </div>  
</body>
<?php include VIEW_PATH . 'templates/footer.php'; ?>
</html>