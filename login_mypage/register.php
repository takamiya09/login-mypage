<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>マイページ登録</title>
    <link rel="stylesheet" type="text/css" href="register.css">
</head>

<body>
    <header>
        <img src="4eachblog_logo.jpg">
    </header>

    <div class="inputform">
        <form method="POST" action="register_confirm.php" enctype="multipart/form-data" >
            <h3>会員登録</h3>
            <div>
                <label for="name">氏名</label>
                <br>
                <input type="text" class="text" size="45" name="name" id="name" required>
            </div>

            <div>
                <label for="mail">メールアドレス</label>
                <br>
                <input type="text" class="text" size="45" name="mail" pattern="^[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
            </div>

            <div>
                <label for="password">パスワード</label>
                <br>
                <input type="text" class="text" size="45" name="password" id="password" pattern="^[a-zA-Z0-9]{6,}$" required>
            </div>

            <div>
                <label for="passwordconfirm">パスワード確認</label>
                <br>
                <input type="text" class="text" size="45" name="passwordconfirm" id="confirm" oninput="ConfirmPassword(this)" required>
            </div>

            <div>
                <label for="picture">プロフィール写真</label>
                <br>
                <input type="hidden" name="max_file_size" value="1000000"/>
                <input type="file" size="40" class="text" name="picture">
            </div>

            <div>
                <label for="comments">コメント</label>
                <br>
                <textarea name="comments" rows="5" cols="45"  id="comments"></textarea>
            </div>

            <div class="submit">
            <input type="submit" class="submit" value="登録する" style="background-color:rgba(3, 154, 3, 0.749); width:160px; height:35px; color:whitesmoke;
            border:none; border-bottom:2px solid green; border-radius: 3px;">
            </div>
        </form>
    </div>
    <footer>
        © 2018 Internous.inc. All rights reserved
    </footer>

    <script>
        function ConfirmPassword(confirm){
            var input1= password.value;
            var input2= confirm.value;
            if(input1 != input2){
                confirm.setCustomValidity("パスワードが一致しません。");
            }else{
                confirm.setCustomValidity("");
            }
        }
    </script>
</body>
</html>
