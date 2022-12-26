<?php
    mb_internal_encoding("utf8");
    session_start();

    if(empty($_POST['from_mypage'])){
    header("Location:login_error.php");
    }
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>マイページ登録</title>
    <link rel="stylesheet" type="text/css" href="mypage_hensyu.css">
</head>

<header>
    <img src="4eachblog_logo.jpg">
    <div class="logoutbutton"><a href="log_out.php" text>ログアウト</a></div>
</header>

<main>
    <div class="editpage">
        <h3>会員情報</h3>
        <div class="hello">
            <?php echo "こんにちは！　" .$_SESSION['name']."さん"; ?>
        </div>

        <form method="POST" action="mypage_update.php">
            <div class="profilephoto">
                <img src="<?php echo $_SESSION['picture'];?>">
            </div>

            <div class="baseinfo">
                <p>氏名：<input type="text" value="<?php echo $_SESSION['name'];?>" name="name" size="30"></p>
                <p>メール：<input type="text" value="<?php echo $_SESSION['mail'];?>" name="mail" size="30"></p>
                <p>パスワード：<input type="text" value="<?php echo $_SESSION['password'];?>" name="password" size="30"></p>
            </div>

            <div class="comments">
                <p><textarea cols="90" rows="3" name="comments" id="comments"><?php echo $_SESSION['comments'];?></textarea></p>
            </div>

            <div class="editcomplete">
                <input type="submit" class="submit_button" value="この内容に変更する" style="background-color:rgba(3, 154, 3, 0.749); width:230px; height:32px; color:whitesmoke;
                border:none; border-bottom:2px solid green; border-radius: 3px;">  
            </div>
        </form>
    </div>
</main>
</html>


