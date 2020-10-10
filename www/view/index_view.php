<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>

  <title>〜静岡の抹茶スイーツを堪能しよう〜</title>
  <link rel="stylesheet" href="../html/assets/css/index.css">

</head>
<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>
  <div class ="jumbotron text-center"  
         style="background:url(top2.jpeg); 
                background-size:cover;
                height: 750px;
                color: white;
                
        ">
    <h1>〜ようこそ,みんなで作る静岡の抹茶の世界へ〜</h1>
  </div>
  <div class="container" style="max-width: 1400px;" >
    <?php include VIEW_PATH . 'templates/messages.php'; ?>
    <div class="row">

      <div class="col-3" style="border:  thin solid grey; margin-right: 30px;"> 
        <div>
          <?php if(is_logined() === true) {?>
            <h5 class="p-1 mb-1 bg-white text-dark"
            style="text-align: center;
                  margin-top: 10px">  
              ようこそ、<?php print($user['user_name']); ?>さん。
            </h5>
            <div style="text-align: center;">
              <form method="POST" action="mypage.php">
                <button type="submit" class="btn btn-success w-75" >マイページへ</button>           
              </form> 
            </div>
          <?php }else { ?>
            <h5 class="p-1 mb-1 bg-white text-dark"
            style="text-align: center;
                  margin-top: 10px">  
              ようこそ、ゲストさん。<br><br>
              ★会員の方はこちら👇
              <div style="text-align: center; margin: 10px;";>
                <a class="btn btn-primary" href="login.php" role="button" >ログイン</a>
              </div>
              ★会員登録はこちら👇
              <div style="text-align: center; margin: 10px;";>
                <a class="btn btn-secondary" href="signup.php" role="button" >新規登録</a>
              </div>
            <?php } ?>
        </div>
        <h5 class="p-1 mb-1 bg-white text-dark"
            style="text-align: center;
                   margin-top: 10px">  
          ★お店を探す
        </h5>
        <form class="form-inline"　action="#" method="GET" style="margin-bottom:10px;">
          <p>ジャンルから探す</p>
          <select class="form-control" name="genre">
            <option disabled selected>選択してください</option>
            <?php foreach($_SESSION['genres'] as $genre) { ?>
              <option value="<?php print h($genre['genre_id']); ?>"><?php print h($genre['genre_name']); ?></option>
              <?php } ?>
          </select>
          <input type="submit" class="btn btn-primary" value="検索" style="margin-left: 10px;">
        </form>
        <form class="form-inline"　action="#" method="GET" style="margin-bottom:10px;">
          <p>市町村から探す</p>
          <select class="form-control" name="genre">
            <option disabled selected>選択してください</option>
            <?php foreach($_SESSION['citys'] as $city) { ?>
              <option value="<?php print h($city['city_id']); ?>"><?php print h($city['city_name']); ?></option>
              <?php } ?>
          </select>
          <input type="submit" class="btn btn-primary" value="検索" style="margin-left: 10px;">
        </form>
      </div>
      <div class="col-8" style="border:  thin solid grey;"> 
        <h5 class="p-1 mb-1 bg-white text-dark"
            style="margin-top: 10px;
                  ">  
          ★新着情報
       </h5>
       <div>
        <table class="table table-borderless" style="text-align: center;">
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
       <h5 class="p-1 mb-1 bg-white text-dark"
       style="margin-top: 10px;
             ">  
     ★トピックス
       </h5>
       <div>
        <table class="table table-borderless" style="text-align: center;">
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
       <h5 class="p-1 mb-1 bg-white text-dark"
       style="margin-top: 10px;
             ">  
     ★あなたへのオススメ抹茶スイーツ
       </h5>
       <div>
        <table class="table table-borderless" style="text-align: center;">
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
       <h5 class="p-1 mb-1 bg-white text-dark"
       style="margin-top: 10px;
             ">  
     ★Twitter情報
       </h5>
       <div>
        <table class="table table-borderless" style="text-align: center;">
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
  
</body>
<?php include VIEW_PATH . 'templates/footer.php'; ?>
</html>