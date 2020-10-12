<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP TEST</title>
</head>
<body>
  <p>掲示板</p>

  <form method="POST" action="<?php print($_SERVER['PHP_SELF']) ?>">
    <input type="text" name="personal_name"><br><br>
    <textarea name="contents" id="" cols="40" rows="8"></textarea><br><br>
    <input type="submit" name="btn1" value="投稿する">
  </form>

  <?php
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      writeDate();
    }

    function writeDate() {
      $personal_name = $_POST['personal_name'];
      $contents = $_POST['contents'];
      $contents = nl2br($contents);

      $date = "<hr>\r\n";
      $date = $date."<p>投稿者：" . ＄personal_name . "</p>\r\n";
      $date = $date."<p>内容：</p>\r\n";
      $date = $date."<p>" . ＄contents . "</p>\r\n";
    }

    $keijiban_file = 'keijiban.txt';

    $fp = fopen($keijiban_file, 'ab');

    if ($fp) {
      if (flock($fp, LOCK_EX)) {
        if (fwrite($fp, $date) === FALSE){
          print('ファイルの書き込みに失敗しました');
        }
        flock($fp, LOCK_UN);
      } else {
        print('ファイルロックに失敗しました');
      }
      fclose($fp);
    }

  ?>
  
</body>
</html>