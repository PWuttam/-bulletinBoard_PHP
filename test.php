<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP TEST</title>
</head>
<body>
  <p>POSTとGETのリクエスト識別テスト</p>

  <form method="POST" action="<?php print($_SERVER['PHP_SELF']) ?>">
    <input type="text" name="personal_name"><br><br>
    <input type="submit" name="btn1" value="投稿する">
  </form>

  <p>
    <a href="<?php print($_SERVER['PHP_SELF']) ?>">自分自身へのリンク</a>
  </p>

  <?php
    
    print('<hr>結果表示<br>');

    // != 右と左が違ったら
    if ($_SERVER["REQUEST_METHOD"] != "POST") {
      print ('GETによる要求です');
    } else {
      print ('POSTによる要求です');
    }

  ?>
  
</body>
</html>