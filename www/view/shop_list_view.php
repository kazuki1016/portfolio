<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'shop_list.css'); ?>">
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'breadcrumb.css'); ?>">
  <title>検索結果</title>
</head>
<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php print HOME_URL?>">Top</a></li>
      <li class="breadcrumb-item active" aria-current="page">
        <?php if(isset($shop_name)){ ?>
          <a>検索結果：<?php print h($shop_name)?></a>
        <?php } else if(isset($genre_id)) { ?>
          <a><?php print h($shops[0]['genre_name'])?></a>
        <?php } else if(isset($city_id)) { ?>
          <a><?php print h($shops[0]['city_name'])?></a>
        <?php } ?>
      </li>
    </ol>
  </nav>
  <div class="container " >
    <?php include VIEW_PATH . 'templates/messages.php'; ?>
    <div class="main">
      <?php if(isset($shop_name)){ ?>
        <h5>「<?php print h($shop_name)?>」の検索結果</h5>
      <?php } else if(isset($genre_id)) { ?>
        <h5>「<?php print h($shops[0]['genre_name'])?>」の検索結果</h5>
      <?php } else if(isset($city_id)) { ?>
        <h5>「<?php print h($shops[0]['city_name'])?>」の検索結果</h5>
      <?php } ?>
    </div>
    <table class="table table-borderless table-responsive-xl">
      <thead>
        <tr class="table_head">
          <th>店名</th>
          <th class="genre_city">ジャンル/市町村</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($shops as $shop){?>
          <tr>
            <td class="shop_list">
              <a href="shop.php?shop_id=<?php print h($shop['shop_id'])?>"><?php print h($shop['shop_name'])?></a>
            </td>
            <td class="genre_city">
              <a href="shop_genre_list.php?genre_id=<?php print h($shop['genre_id'])?>"><?php print h($shop['genre_name'])?></a>/
              <a href="shop_city_list.php?city_id=<?php print h($shop['city_id'])?>"><?php print h($shop['city_name'])?></a>
            </td>
            <td>
            </td>
          </tr>
          <tr>
            <td class="detail" colspan="2"><?php print (nl2br(h($shop['shop_detail']))) ?></td>
            <td>
              <div class="image_space">
                <img src="<?php print h(IMAGE_PATH . $shop['filename'])?>">
              </div>
            </td>
            <td>
              <?php if(in_array($my_shoplist['shop_id'], $_SESSION['my_shoplists_ids'])) {?>  
                <a class="btn btn-primary btn_mypage" href="edit_shop.php?shop_id=<?php print h($shop['shop_id']);?>">編集する</a>         
              <?php } ?>
              <?php if(is_logined() === true) {?>  
                <?php if(in_array($my_shoplist['shop_id'], $_SESSION['bookmarked_shop_ids'])===false) {?>  
                  <a class="btn btn-success btn_mypage" href="bookmark.php?shop_id=<?php print h($shop['shop_id']);?>">お気に入りへ</a>         
                <?php } ?>
              <?php } ?>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</body>
<?php include VIEW_PATH . 'templates/footer.php'; ?>
</html>