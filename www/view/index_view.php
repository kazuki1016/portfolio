<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <title>〜静岡の抹茶スイーツを堪能しよう〜</title>
  <link rel="stylesheet" href="<?php print (STYLESHEET_PATH . 'index.css'); ?>">
</head>
<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>
  <div class ="jumbotron"  
        ">
    <h1>〜ようこそ,みんなで作る静岡の抹茶の世界へ〜</h1>
  </div>
  <div class="container">
    <?php include VIEW_PATH . 'templates/messages.php'; ?>
    <div class="row">
      <div class="col-3"> 
        <div>
          <?php if(is_logined() === true) {?>
            <h6 class="p-1 mb-1 bg-white text-dark"> ようこそ、<?php print($user['user_name']); ?>さん。</h6>
            <div class="action_button">
              <a class="btn btn-success" href="<?php print(MYPAGE_URL);?>" role="button" >マイページへ</a>         
            </div>
          <?php }else { ?>
            <h6 class="p-1 mb-1 bg-white text-dark"> ようこそ、ゲストさん。</h6>
            <p class="p-1 mb-1 bg-white text-dark"> 会員の方はこちら👇</p>
              <div class="action_button">
                <a class="btn btn-dark" href="<?php print(LOGIN_URL);?>" role="button" >ログイン</a>
              </div>
            <p class="p-1 mb-1 bg-white text-dark">会員の方はこちら👇</p>
              <div class="action_button">
                <a class="btn btn-secondary" href="<?php print(SIGNUP_URL);?>" role="button" >新規登録</a>
              </div>
          <?php } ?>
        </div>
        <h6 class="p-1 mb-1 bg-white text-dark"">お店を探す</h6>
        <p>ジャンルから探す</p>
        <form method="GET" action="shop_genre_list.php" class="form-inline" target="_blank">
          <select name="genre_id" class="form-control">
            <option disabled selected>選択してください</option>
            <?php foreach($genres as $genre) { ?>
              <option value="<?php print h($genre['genre_id']); ?>"><?php print h($genre['genre_name']."({$genre['shop_number_per_genre']})"); ?></option>
            <?php } ?>
          </select>
          <input type="submit" class="btn btn-primary serch_button" value="検索">
        </form>
        <p>市町村から探す</p>
        <form method="GET" action="shop_city_list.php" class="form-inline">
          <select name="city_id" class="form-control" >
            <option disabled selected>選択してください</option>
            <?php foreach($_SESSION['citys'] as $city) { ?>
              <option value="<?php print h($city['city_id']); ?>"><?php print h($city['city_name']."({$city['shop_number_per_city']})"); ?></option>
              <?php } ?>
          </select>
          <input type="submit" class="btn btn-primary" value="検索">
        </form>
      </div>
      <div class="col-8" style="border:  thin solid grey;"> 
        <h6 class="p-1 mb-1 bg-white text-dark">新着情報</h6>
       <div>
        <table class="table table-borderless">
          <thead>
            <tr>
              <th>写真</th>
              <th>写真</th>
              <th>写真</th>
              <th>写真</th>
              <th>写真</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>説明</td>
              <td>説明</td>
              <td>説明</td>
              <td>説明</td>
              <td>説明</td>
            </tr>
          </tbody>
        </table>
      </div>
      <h6 class="p-1 mb-1 bg-white text-dark"style="margin-top: 10px;">トピックス</h6>
      <div>
      <table class="table table-borderless">
          <thead>
            <tr>
              <th>写真</th>
              <th>写真</th>
              <th>写真</th>
              <th>写真</th>
              <th>写真</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>説明</td>
              <td>説明</td>
              <td>説明</td>
              <td>説明</td>
              <td>説明</td>
            </tr>
          </tbody>
        </table>
      </div>
      <h6 class="p-1 mb-1 bg-white text-dark">あなたへのオススメ抹茶スイーツ
      </h6>
      <div>
        <table class="table table-borderless">
          <thead>
            <tr>
              <th>写真</th>
              <th>写真</th>
              <th>写真</th>
              <th>写真</th>
              <th>写真</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>説明</td>
              <td>説明</td>
              <td>説明</td>
              <td>説明</td>
              <td>説明</td>
            </tr>
          </tbody>
        </table>
      </div>
      <h6 class="p-1 mb-1 bg-white text-dark">Twitter情報</h6>
      <div>
          <table class="table table-borderless">
            <thead>
              <tr>
                <th>写真</th>
                <th>写真</th>
                <th>写真</th>
                <th>写真</th>
                <th>写真</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>説明</td>
                <td>説明</td>
                <td>説明</td>
                <td>説明</td>
                <td>説明</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</body>
<?php include VIEW_PATH . 'templates/footer.php'; ?>
</html>