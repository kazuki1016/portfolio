<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'shop.css'); ?>">
  <title>お店情報</title>
</head>
<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php print HOME_URL?>">Top</a></li>
      <li class="breadcrumb-item"><a href="<?php print HOME_URL?>">Top</a>検索結果</li>
      <li class="breadcrumb-item active" aria-current="page">検索結果</li>
    </ol>
  </nav>  
  <div class="container">
    <table class="table table-borderless table-responsive-xl">
      <tbody>
        <?php foreach($shop as $data){?>
          <tr>
            <td colspan="3" class="shop_list"><h4><?php print h($data['shop_name'])?></h4></td>
          </tr>
          <tr>
            <td class="status">
              <div class="status">
                ジャンル：<a href="shop_genre_list.php?genre_id=<?php print h($data['genre_id'])?>"><?php print h($data['genre_name'])?></a>
                市町村：<a href="shop_city_list.php?city_id=<?php print h($data['city_id'])?>"><?php print h($data['city_name'])?></a>
              </div>
            </td>
            <td colspan="2">
              <div class="shop_form">
                <?php if(in_array($data['shop_id'], $_SESSION['bookmarked_shop_ids'])===false){?>   <!--既にお気に入り済みならお気に入りボタンを表示させない  -->
                  <a class="btn btn-success btn_mypage" href="bookmark.php?shop_id=<?php print h($data['shop_id']);?>">お気に入りへ</a>         
                <?php } ?>
                  <a class="btn btn-primary btn_mypage" href="impression.php?shop_id=<?php print h($data['shop_id']);?>">口コミを見る</a>         
              </div>
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <div class="image_space">
                <img src="<?php print h(IMAGE_PATH . $data['filename'])?>"></td>
              </div>
            </td>
          </tr>   
          <tr>
            <td colspan="3"><?php print h($data['shop_detail'])?></td>
          </tr>   
        <?php } ?>
      </tbody>
    </table>
  </div>
</body>
<?php include VIEW_PATH . 'templates/footer.php'; ?>
</html>