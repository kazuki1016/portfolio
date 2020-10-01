<header>
  <nav class="navbar navbar-expand-sm navbar-light bg-light">
    <a class="navbar-brand" href="<?php print(HOME_URL);?>">Top</a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#headerNav" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="ナビゲーションの切替">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="headerNav">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?php print(LOGOUT_URL);?>">ログアウト</a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="<?php print(LOGIN_URL);?>">ログイン</a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
          ようこそ、<?php print($user['name']); ?>さん。
        </li>
      </ul>
    </div>
  </nav>
  <p class ="text-right"></p>
</header>