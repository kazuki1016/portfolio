<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <link rel=”stylesheet” type=”text/css” href="mypage.css" />


  <title>検索結果</title>
</head>
<style>
  .container{
    max-width: 1400px;
  }

  .main {
    margin:0 auto;
    width: 90%;
  }
  /* .nav {
    display: table;
    background-color:rgb(240, 238, 238);
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 40px;
  } */
  h5{
    padding-top: 20px;
  }
  .nav__item {
      display: table-cell;
      margin-left: auto;
      margin-right: auto;
      margin-bottom: 30px;
  }
  .nav__item + .nav__item {
      border-left: 1px solid #CCC;
  }
  .nav__item a {
      display: block;
      padding: 10px 40px;
      color: #666;
      text-decoration: none;
  }

  .nav_shop {
    display: table;
    width: 100%;
  }  
  .nav_shop_item {
    display: table-cell;
    margin-top: 20px;
  }
  .nav_shop_set {
    display: table-cell;
    margin-top: 20px;
    /* width: 80%; */
    
  }
  .nav_shop_item a {
    display: block;
    padding: 15px 30px;
    text-decoration: none;
  }
  .main_border{
    border-bottom: inset 1px gray;
  }
  .table th{
    border:none;
  } 
  .table td{
    vertical-align:middle;
  }
  .shop_list a{
    font-size: 25px;
    padding-left: 0.5em;
    border-left: solid 0.7em palevioletred;
  }
  .table img{
    max-width: 100%;
  }
  .mypage_form{
    display:inline-flex;  
  }
  .btn_mypage{
    margin-right: 20px;
  }
</style>
<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>
  <div class="container " >
    <?php include VIEW_PATH . 'templates/messages.php'; ?>
    <div class="row main">
  </div>
  <div class="main_border">
    <?php if(isset($shop_name)){ ?>
      <h5>「<?php print h($shop_name)?>」の検索結果</h5>
    <?php } else if(isset($genre_id)) { ?>
      <h5>「<?php print h($shops[0]['genre_name'])?>」の検索結果</h5>
    <?php } else if(isset($city_id)) { ?>
      <h5>「<?php print h($shops[0]['city_name'])?>」の検索結果</h5>
    <?php } ?>
      </div>
        <table class="table">
          <thead>
            <tr>
              <th>店名</th>
              <th>ジャンル/市町村</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
           <?php foreach($shops as $shop){?>
            <tr>
              <td>
                <div class="shop_list">
                  <a href="shop.php?shop_id=<?php print h($shop['shop_id'])?>"><?php print h($shop['shop_name'])?></a>
                </div>
              </td>
              <td class="genre_city">
                <div>
                  <a href="shop_genre_list.php?genre_id=<?php print h($shop['genre_id'])?>"><?php print h($shop['genre_name'])?></a>/
                  <a href="shop_city_list.php?city_id=<?php print h($shop['city_id'])?>"><?php print h($shop['city_name'])?></a>
                </div>
              </td>
              <td>
                <div class="mypage_form">
                <?php if(in_array($shop['shop_id'], $_SESSION['bookmarked_shop_ids'])===false){?>   <!--既にお気に入り済みならお気に入りボタンを表示させない  -->
                  <form method="POST" action="bookmark.php">
                    <input type="submit" value="❤お気に入りへ" class="btn btn-success btn_mypage">
                    <input type="hidden" name="shop_id" value="<?php print h($shop['shop_id'])?>">
                  </form>
                <?php } ?>
                </div>
              </td>
            </tr>
            <tr>
              <td><img src="<?php print h(IMAGE_PATH . $shop['filename'])?>"></td>
              <td colspan="2"><?php print (nl2br(h($shop['shop_detail']))) ?></td>
            </tr>            
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  
</body>
<?php include VIEW_PATH . 'templates/footer.php'; ?>
</html>