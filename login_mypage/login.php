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
    <link rel="stylesheet" type="text/css" href="login.css">
</head>

<body>
    <header>
        <img src="4eachblog_logo.jpg">
    </header>

    <div class="loginform">
        <form method="POST" action="mypage.php" >
            <div class="putdata">
                <div class="mail">
                    <label>メールアドレス</label><br>
                    <input type="text" class="formbox" size="46" name="mail" value="<?php
                        if(isset($_COOKIE['login_keep'])){
                            echo $_COOKIE['mail'];
                        }
                    ?>">
                </div>

                <div class="password">
                    <label>パスワード</label><br>
                    <input type="text" text-align:center class="formbox" size="46" name="password" value="<?php
                        if(isset($_COOKIE['login_keep'])){
                            echo $_COOKIE['password'];
                        }
                    ?>">
                </div>
            
                <div class="login_check">
                    <label><input type="checkbox" class="formbox" size="40" name="login_keep" value="login_keep"
                    <?php
                        if(isset($_COOKIE['login_keep'])){
                            echo "checked='checked'";
                        }
                    ?>>ログイン状態を保持する</label>
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