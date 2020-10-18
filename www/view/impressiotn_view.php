<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <title>口コミ一覧</title>
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'admin.css'); ?>">
</head>
<style>
  .container{
    max-width: 900px;
  }
  h4{
    padding: 30px 0;
    text-align: center;
  }
  .main_impression{
    border: thin solid grey;
    -moz-border-radius: 1em;
    -webkit-border-radius: 1em;
    -o-border-radius: 1em;
    -ms-border-radius: 1em;
  }
  .head{
    border-bottom: thin solid rgb(221, 221, 221);
  }
  .btn-primary{
    padding: 0.375rem 2.375rem;
  }
  .btn_impression{
    text-align: center;
    padding-bottom: 30px;
  }
  .table th{
    font-size: 15px;
  }
  .title{
    font-size: 30px;

  }
</style>
<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>
  <div class="container">
    <?php include VIEW_PATH . 'templates/messages.php'; ?>
    <h4><?php print h($shop[0]['shop_name'])?>の口コミ一覧</h4>
    <div class="btn_impression">
    <a href="article.php?shop_id=<?php print h($shop[0]['shop_id'])?>">口コミを投稿する</a>
      <!-- <form method="GET" action="article.php">
        <input type="submit" value="口コミを投稿する" class="btn btn-primary">
        <input type="hidden" name="shop_id" value="<?php print h($shop[0]['shop_id']);?>">
      </form> -->
    </div>
    <p>全<?php ?>件</p>
    <div class="main_impression"> 
        <table class="table table-borderless">

        <thead>
          <tr class="head">
            <th>さんの口コミ</th>
          </tr>
          <tr>
            <th>2020/7月訪問</th>
          </tr>
          <tr>
            <td class="title"><u>とても濃厚な味！！</u></td>
          </tr>
          <tr>
            <td>番号はジェラートの濃さを表しますが、もっとも薄いのが1番、そして濃いのが7番です。
              1番が一般的なアイスクリームに含まれる抹茶の濃さと同じくらいだそうで、7番は7倍って事ですね。。。
              それでは実食！
              
              確かに濃い。ホントに濃い。
              でも抹茶あるあるの苦みもなく、味わい深い。
              合わせて選んだ“新茶”も、こんなに爽やかな味がするなんて。。。これは良い！</td>
          </tr>
        </tbody>
      </table>

    </div>
  </div>
  <?php include VIEW_PATH . 'templates/footer.php'; ?>
</body>
</html>