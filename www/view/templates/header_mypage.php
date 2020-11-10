<style>
  /* nav{
    background: linear-gradient(180deg, #06184b, #061d85);
  } */
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
<div class="navbar navbar-expand-xl  navbar-light bg-light">
  <button type="button" 
          class="navbar-toggler" 
          data-toggle="collapse" 
          data-target="#bs-navi" 
          aria-controls="bs-navi" 
          aria-expanded="false" 
          aria-label="Toggle navigation">
    管理ページメニュー<span class="navbar-toggler-icon"></span>
  </button>
  
  <div class="collapse navbar-collapse" id="bs-navi">
    <ul class="navbar-nav">
      <li class="nav__item"><a class="nav-link" href="mypage.php">お店管理ページ</a></li>
      <li class="nav__item"><a class="nav-link" href="registuser_list.php">ユーザー管理ページ</a></li>
      <li class="nav__item"><a class="nav-link" href="comment_list.php">口コミ管理ページ</a></li>
      <li class="nav__item"><a class="nav-link" href="add.php">お店登録へ</a></li>
    </ul>
  </div>
</div>
</header>