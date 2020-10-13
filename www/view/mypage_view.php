<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <link rel=”stylesheet” type=”text/css” href="mypage.css" />


  <title>マイページ</title>
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
  h3{
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
  .table th{
    text-align: center;
  } 
  .table td{
    width:70%;
    vertical-align:middle;
    padding: 20px 10px;
  } 
  .table a{
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
  .genre_city{
    text-align: center;
  }

</style>
<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>
  <div class="container " >
    <h3><?php print h($user['user_name']); ?>さんのマイページ</h2>
    <?php include VIEW_PATH . 'templates/messages.php'; ?>
    <div class="row main">
      <div class="col-7 nav__item">
          <li class="nav__item"><a href="mypage.php">マイページトップへ</a></li>
          <li class="nav__item"><a href="kike.php">お気に入り一覧へ</a></li>
          <li class="nav__item"><a href="add.php">お店登録へ</a></li>

      </div>
  </div>
  <div class="main_border">
      <h5>投稿したお店</h5>
      </div>
        <table class="table">
          <thead>
            <tr>
              <th>店名</th>
              <th>ジャンル</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
           <?php foreach($my_shoplists as $my_shoplist){?>
            <tr>
              <td><a href="shop.php?shop_id=<?php print h($my_shoplist['shop_id'])?>"><?php print h($my_shoplist['shop_name'])?></a></td>
              <td class="genre_city"><?php h(print $my_shoplist['genre_name'])?>/<?php print h($my_shoplist['city_name'])?></td>
              <td>
                <div class="mypage_form">
                  <form method="POST" action="edit.php"><input type="submit" value="編集する" class="btn btn-primary btn_mypage"><input type="hidden" value=""></form>
                  <form method="POST" action="bookmark.php"><input type="submit" value="❤お気に入りへ" class="btn btn-success btn_mypage"><input type="hidden" value=""></form>
                  <form method="POST" action="mypage_delete.php"><input type="submit" value="お店の削除" class="btn btn-secondary btn_mypage"><input type="hidden" value=""></form>
                </div>
              </td>
            </tr>
            <tr>
              <td><img src="<?php print h(IMAGE_PATH . $my_shoplist['filename'])?>"></td>
              <td colspan="2"><?php print h($my_shoplist['shop_detail'])?></td>
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