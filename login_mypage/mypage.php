<?php
    mb_internal_encoding("utf8");
    session_start();

    if(empty($_SESSION['id'])){
        try{
            $pdo = new PDO("mysql:dbname=lesson01; host=localhost;","root","mysql");
        }catch(PDOException $e){
            die("<p>申し訳ございません。現在サーバーが混みあっており一時的にアクセスが出来ません。<br>しばらくしてから再度ログインをしてください。</p>
            <a href='http://login_mypage/login.php'>ログイン画面へ</a>"
            );
        }

    $stmt = $pdo->prepare("select * from login_mypage where mail=? && password = ?");
    
    $stmt->bindValue(1,$_POST["mail"]);
    $stmt->bindValue(2,$_POST["password"]);

    $stmt->execute();
    $pdo=NULL;

    while($row = $stmt->fetch()) {
        $_SESSION['id']= $row['id'];
        $_SESSION['name']= $row['name'];
        $_SESSION['mail']= $row['mail']; 
        $_SESSION['password']= $row['password']; 
        $_SESSION['picture']= $row['picture'];
        $_SESSION['comments']= $row['comments'];   
    }

    if(empty($_SESSION['id'])){
        header("Location:login_error.php");
    }

    if(!empty($_POST['login_keep'])){
        $_SESSION['login_keep']=$_POST['login_keep'];
    }
}

if(!empty($_SESSION['id']) && !empty($_SESSION['login_keep'])) {
    setcookie('mail', $_SESSION['mail'], time()+60*60*24*7);
    setcookie('password', $_SESSION['password'], time()+60*60*24*7);
    setcookie('login_keep', $_SESSION['login_keep'], time()+60*60*24*7);


}else if(empty($_SESSION['login_keep'])){
    setcookie('mail', '',time()-1);
    setcookie('password','', time()-1);
    setcookie('login_keep','', time()-1);
}   
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>マイページ登録</title>
    <link rel="stylesheet" type="text/css" href="mypage.css">
</head>

<header>
    <img src="4eachblog_logo.jpg">
    <div class="logoutbutton"><a href="log_out.php" text>ログアウト</a></div>
</header> 

<div class="mypage">
    <h3>会員情報</h3>
    <div class="hello">
        <?php echo "こんにちは！　" .$_SESSION['name']."さん"; ?>
    </div>

    <div class="profilephoto">
        <img src="<?php echo $_SESSION['picture']?>">
    </div>

    <div class="baseinfo">
        <p>氏名：<?php echo $_SESSION['name']?></p>
        <p>メール：<?php echo $_SESSION['mail']?><p/>
        <p>パスワード：<?php echo $_SESSION['password']?></p>
    </div>

    <div class="comments">
        <p><?php echo $_SESSION['comments']?></p>
    </div>

    <form method="POST" action="mypage_hensyu.php" class="form_center">
        <input type="hidden" value="<?php echo rand(1,10);?>" name="from_mypage">
        <div class="editbutton">
            <input type="submit" class="submit_button" value="編集する" style="background-color:rgba(3, 154, 3, 0.749); width:160px; height:35px; color:whitesmoke;
                border:none; border-bottom:2px solid green; border-radius: 3px;">    
        </div>
    </form>
</div>

<footer>
    © 2018 Internous.inc. All rights reserved
</footer>
</html>
