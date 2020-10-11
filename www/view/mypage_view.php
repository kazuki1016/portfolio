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

</style>
<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>
  <div class="container " >
    <h2><?php print($user['user_name']); ?>さんのマイページ</h2>
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
            <!-- ここでforeach -->
            <tr>
              <td><a href="shop.php?shop_id=<?php print $shop['shop_id']?>">ななや</a></td>
              <td>アイス/藤枝市</td>
              <td>
                <div style="display:inline-flex">
                  <form method="POST" action="edit.php"><input type="submit" value="編集する" class="btn btn-primary"><input type="hidden" value=""></form>
                  <form method="POST" action="bookmark.php"><input type="submit" value="❤お気に入りへ" class="btn btn-success"><input type="hidden" value=""></form>
                </div>
              </td>
            </tr>
            <tr>
              <td><img src="top.jpg"></td>
              <td colspan="2">銭湯を改装したため、それが店名『ニューヨーク ジョー（入浴場） エクスチェンジ』となっているお店で、お店に入った瞬間、開放的な空間が広がり、もと銭湯だった空間に、多数のアイテムが並べられているという不思議で面白い内装です。 アイテムを売りに来た場合、商品と交換（トレード）できるスタイルが魅力的ですが、店内の商品が全体的にリーズナブルなのも魅力です。 商品はインポート、ユーズド、ノーブランドに関わらず洋服からバッグや靴、帽子、アクセサリーなどを扱ってますが、特に、Vivienne westwood、Dr.Martens、MARC BY MARC JACOBS、adidasなど、現行のブランド品は、他店のリサイクルショップと比較してもかなりの低価格となっています。 毎月第一日曜日には、全商品半額セール「The First Sunday SALE」が開催され、行列ができる程の盛況ぶりになります。スタッフの方は、皆さん明るくて元気がよく、店内は常に活気が溢れていることもあり、アイテムを売りに来た方も買いにきた方も、どなたでも楽しめるお店です。</td>
            </tr>
            <!-- ここまでforeach -->
            <tr>
              <td><a href="shop.php?shop_id=<?php print $shop['shop_id']?>">ななや</a></td>
              <td>アイス/藤枝市</td>
              <td>
                <div style="display:inline-flex">
                  <form method="POST" action="edit.php"><input type="submit" value="編集する" class="btn btn-primary"><input type="hidden" value=""></form>
                  <form method="POST" action="bookmark.php"><input type="submit" value="❤お気に入りへ" class="btn btn-success"><input type="hidden" value=""></form>
                </div>
              </td>
            </tr>
            <tr>
              <td><img src="top.jpg"></td>
              <td colspan="2">銭湯を改装したため、それが店名『ニューヨーク ジョー（入浴場） エクスチェンジ』となっているお店で、お店に入った瞬間、開放的な空間が広がり、もと銭湯だった空間に、多数のアイテムが並べられているという不思議で面白い内装です。 アイテムを売りに来た場合、商品と交換（トレード）できるスタイルが魅力的ですが、店内の商品が全体的にリーズナブルなのも魅力です。 商品はインポート、ユーズド、ノーブランドに関わらず洋服からバッグや靴、帽子、アクセサリーなどを扱ってますが、特に、Vivienne westwood、Dr.Martens、MARC BY MARC JACOBS、adidasなど、現行のブランド品は、他店のリサイクルショップと比較してもかなりの低価格となっています。 毎月第一日曜日には、全商品半額セール「The First Sunday SALE」が開催され、行列ができる程の盛況ぶりになります。スタッフの方は、皆さん明るくて元気がよく、店内は常に活気が溢れていることもあり、アイテムを売りに来た方も買いにきた方も、どなたでも楽しめるお店です。</td>
            </tr>
            
          </tbody>
        </table>
        <!-- <ul class="nav_shop">
          <li class="nav_shop_set">店名</li>
          <li class="nav_shop_set">ジャンル/市町村名</li>
          <form action="edit.php" method="POST">
            <input type="submit" class="btn btn-primary" value="編集する">
          </form>
        </ul>
        <ul class="nav_shop">
          <li class="nav_shop_set">ななや</li>
          <li class="nav_shop_set">アイス/藤枝市</li>
          <li class="nav_shop_set"></li>
        </ul> -->
      </div>
    </div>
  </div>
  
</body>
<?php include VIEW_PATH . 'templates/footer.php'; ?>
</html>