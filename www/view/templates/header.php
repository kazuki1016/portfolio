
<style>
  .navbar-bran, .nav-link{
    color: white;  
  } 
  .form-group{
    display: inline;
  }
  .nav-item{
    padding-right: 20px;
  }
</style>
<header>
  <nav class="navbar navbar-expand-sm nnavbar-light bg-light" style="background: linear-gradient(180deg, #06184b, #061d85)">
    <a class="navbar-brand" style="color: white;" href="<?php print(HOME_URL);?>">Top</a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#headerNav" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="ナビゲーションの切替">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="headerNav">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?php print(SIGNUP_URL);?>">サインアップ</a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
          <form class="navbar-form" method="GET" action="#">
          <input type="text" class="form-control" placeholder="キーワード">
        </li>
        <li class="nav-item">
          <input type="submit" class="btn btn-info" value="検索">
          </form>
        </li>
      </ul>
    </div>
  </nav>
  <!-- <p class ="text-right"></p> -->
</header>
