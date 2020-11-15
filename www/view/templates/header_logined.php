<style>
  nav{
    background: linear-gradient(180deg, #06184b, #061d85);
  }
  .form-group{
    display: inline;
  }
  .form-control{
    margin:10px 20px;
    width:90%;
  }
  .btn-info{
    margin: 0 auto;
  }
</style>

<header>
  <nav class="navbar navbar-dark bg-light" style="color: white;  ">
    <a href="<?php print(HOME_URL);?>" class="navbar-brand">Top</a>
    <?php if(is_logined() === true) {?>
      <?php print h($user['user_name']) ?>さんがログイン中
    <?php }else { ?>
      ようこそ、ゲストさん
    <?php } ?>
    <button class="navbar-toggler" type="button"
    data-toggle="collapse"
    data-target="#navmenu1"
    aria-controls="navmenu1"
    aria-expanded="false"
    aria-label="Toggle navigation">
    メニュー<span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navmenu1">
      <div class="navbar-nav">
        <?php if(is_logined() === true) {?>
          <a class="nav-link" href="<?php print(LOGOUT_URL);?>">ログアウト</a>
        <?php }else { ?>
          <a class="nav-link" href="<?php print(SIGNUP_URL);?>">サインアップ</a>
          <a class="nav-link" href="<?php print(LOGIN_URL);?>">ログイン</a>
        <?php } ?>
        <span>検索メニュー</span>
        <div class="d-lg-flex justify-content-around">
          <form method="GET" action="shop_name_list.php" class="form-inline " >
            <input type="text" name="shop_name" class="form-control" placeholder="キーワード">
            <input type="submit" class="btn btn-info" value="検索">
          </form>
          <form method="GET" action="shop_genre_list.php" class="form-inline" target="_blank">
            <select name="genre_id" class="form-control">
              <option disabled selected>ジャンルから検索</option>
              <?php foreach($_SESSION['genres'] as $genre) { ?>
                <option value="<?php print h($genre['genre_id']); ?>"><?php print h($genre['genre_name']."({$genre['shop_number_per_genre']})"); ?></option>
              <?php } ?>
            </select>
            <input type="submit" class="btn btn-info" value="検索">
          </form>
          <form method="GET" action="shop_city_list.php" class="form-inline">
            <select name="city_id" class="form-control" >
              <option disabled selected>市町村から検索</option>
              <?php foreach($_SESSION['citys'] as $city) { ?>
                <option value="<?php print h($city['city_id']); ?>"><?php print h($city['city_name']."({$city['shop_number_per_city']})"); ?></option>
                <?php } ?>
            </select>
            <input type="submit" class="btn btn-info" value="検索">
          </form>
        </div>
      </div>
    </div>
  </nav>
</header>