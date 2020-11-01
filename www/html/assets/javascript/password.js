// HTMLタグの中から指定したidを取得して何らかの処理をしたい場合などに使用
const pwd = document.getElementById('password');  //documentオブジェクトを活用することで、HTML要素へアクセス
const pwdCheck = document.getElementById('password-check');
//対象要素に対してさまざまなイベント処理を実行することができるメソッド今回はpwdCheck（checkbox）がクリックされたら起動する
// 「change」は、例えばラジオボタンがチェックされた時や文字列が入力されたあとなどにイベントが発動する
pwdCheck.addEventListener('change', function() {
    if(pwdCheck.checked) {  //checkedはチェックされたという意味
        pwd.setAttribute('type', 'text');  //チェックボックスにチェックが入ったらtype = textに変更
    } else {
        pwd.setAttribute('type', 'password');  //チェックボックスにチェックを外したらtype = passwordに変更
    }
}, false);

const pwd_conf = document.getElementById('password_confirmation');  //documentオブジェクトを活用することで、HTML要素へアクセス
const pwdCheck_conf = document.getElementById('password-check-conf');
//対象要素に対してさまざまなイベント処理を実行することができるメソッド今回はpwdCheck（checkbox）がクリックされたら起動する
// 「change」は、例えばラジオボタンがチェックされた時や文字列が入力されたあとなどにイベントが発動する
pwdCheck_conf.addEventListener('change', function() {
    if(pwdCheck_conf.checked) {  //checkedはチェックされたという意味
        pwd_conf.setAttribute('type', 'text');  //チェックボックスにチェックが入ったらtype = textに変更
    } else {
        pwd_conf.setAttribute('type', 'password');  //チェックボックスにチェックを外したらtype = passwordに変更
    }
}, false);
