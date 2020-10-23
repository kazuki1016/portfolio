<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <title>お店情報</title>
  <link rel=”stylesheet” href="css/shop.css" />
</head>
<style>
  .container{
    max-width: 1000px;
  }

  .main {
    margin:0 auto;
    width: 90%;
  }
  h4{
    padding-top: 20px;
  }

  .main_border{
    border-bottom: inset 1px gray;
  }
  .table th{
    text-align: center;
  } 
  .table td{
    width:100%;
    vertical-align:middle;
    padding: 20px 10px;
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
  /* .status{
    padding: 0px 10px;
  } */ 
 </style>
<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>
  <div class="container " >
    <?php include VIEW_PATH . 'templates/messages.php'; ?>
      <table class="table">
        <tbody>
          <?php foreach($shop as $data){?>
          <tr>
            <td colspan="3" class="shop_list"><h4><?php print h($data['shop_name'])?></h4></td>
          </tr>
          <tr>
            <td class="status">
              <div class="status">
                ジャンル：<a href="shop.php?genre_name=<?php print h($data['genre_name'])?>"><?php print h($data['genre_name'])?></a>
              </div>
              <div class="status">
                市町村：<a href="shop.php?city_name=<?php print h($data['city_name'])?>"><?php print h($data['city_name'])?></a>
              </div>

          </td>
          <td>
            <div class="mypage_form">
              <form method="POST" action="bookmark.php">
                <input type="submit" value="❤お気に入りへ" class="btn btn-success btn_mypage">
                <input type="hidden" value="">
              </form>
              <form method="GET" action="impression.php">
                <input type="submit" value="口コミ" class="btn bg-info text-white btn_mypage">
                <input type="hidden" name="shop_id" value="<?php print h($data['shop_id']);?>">
              </form>
            </div>
           </td>
        </tr>
          <tr>
            <td><img src="<?php print h(IMAGE_PATH . $data['filename'])?>"></td>
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