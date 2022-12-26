<?php
    session_start();
    if(isset($_SESSION['id'])){
        header("Location:mypage.php");
    }
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>マイページ登録</title>
    <div class="login"><link rel="stylesheet" type="text/css" href="login.css"></div>
</head>

<body>
    <header>
        <img src="4eachblog_logo.jpg">
        <div class="loginbutton"><a href="login.php" text>ログイン</a></div>
    </header>

    <div class="loginform">
        <p>メールアドレスまたはパスワードが間違っています。</p>
        <form method="POST" action="mypage.php" >
            <div class="putdata">
                <div class="mail">
                    <label for="mail">メールアドレス</label><br>
                    <input type="text" class="formbox" size="43" name="mail" id="mail">
                </div>

                <div class="password">
                    <label for="password">パスワード</label><br>
                    <input type="text" class="formbox" size="43" name="password" id="password">
                </div>
            </div>

            <div class="login">
            <input type="submit" class="submit_button" value="ログイン" style="background-color:rgba(3, 154, 3, 0.749); width:160px; height:35px; color:whitesmoke;
            border:none; border-bottom:2px solid green; border-radius: 3px;">
            </div>
        </form>       
    </div>

    <footer>
        © 2018 Internous.inc. All rights reserved
    </footer> 
</body>
</html>