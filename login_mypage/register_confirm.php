<?php
    mb_internal_encoding("utf8");
    $temp_pic_name= $_FILES['picture']['tmp_name'];
    $original_pic_name= $_FILES['picture']['name'];
    $path_filename= './image/'.$original_pic_name;
    move_uploaded_file($temp_pic_name,'./image/'.$original_pic_name);
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>マイページ登録</title>
    <link rel="stylesheet" type="text/css" href="register_confirm.css">
</head>
<body>
    <header>
        <img src="4eachblog_logo.jpg">
    </header>

    <div class="confirm">
        <h3>会員登録 確認</h3>
        <div class="para">こちらの内容で登録しても宜しいでしょうか？<br></div>

        <p>
            氏名：
            <?php echo $_POST['name'];?>
        </p>
        <p>
            メール：
            <?php echo $_POST['mail'];?>
        </p>
        <p>
            パスワード：
            <?php echo $_POST['password'];?>
        </p>
        <p>
            プロフィール写真：
            <?php echo $_FILES['picture']['name'];?>
        </p>
        <p>
            コメント：
            <?php echo $_POST['comments'];?>
        </p>
        
        <div class="buttonwrap">
            <form action="register.php">
                <input type="submit" class="button1" value="戻って修正する" style="background-color:rgb(212, 209, 209); width:160px; height:35px; color:white;
                border:none; border-bottom:2px solid gray; border-radius: 3px;">
            </form>

            <form method="POST" action="register_insert.php">
                <input type="submit" class="button2" value="登録する" style="background-color:rgba(3, 154, 3, 0.749); width:160px; height:35px; color:whitesmoke;
                border:none; border-bottom:2px solid green; border-radius: 3px;">
                <input type="hidden" value="<?php echo $_POST['name'];?>" name="name">
                <input type="hidden" value="<?php echo $_POST['mail'];?>" name="mail">
                <input type="hidden" value="<?php echo $_POST['password'];?>" name="password">
                <input type="hidden" value="<?php echo $path_filename;?>" name="path_filename">
                <input type="hidden" value="<?php echo $_POST['comments'];?>" name="comments">
            </form>
        </div>
    </div>

    <footer>
        © 2018 Internous.inc. All rights reserved
    </footer>
</body>
</html>