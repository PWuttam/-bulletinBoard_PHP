<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>いぬねこ掲示板</title>
</head>
<body>
  <h1>いぬねこ掲示板</h1>
  <section>
    <h2>新規投稿</h2>

    <!-- $_SERVER['PHP_SELF']はこの構文が記述されているHTML自身を指す。 -->
    <!-- print関数で出力することによりPOSTの送信先として自分自身を表すHTMLファイルの位置を指定。 -->

    <form action="<?php print($_SERVER['PHP_SELF']) ?>" method="POST">
      表示名：
      <input type="text" name="personal_name"><br><br>
      投稿メッセージ：<br>
      <textarea name="contents" cols="40" rows="8"></textarea><br><br>
      <input type="submit" name="btn1" value="書き込む">
    </form>

  </section>
  <section>
    <h2>投稿一覧</h2>

    <?php

      $personal_name = $_POST['personal_name'];
      $contents = nl2br($_POST['contents']);


      print('<p>投稿者：'.$personal_name.'</p>');
      print('<p>内容：</p>');
      print('<p>'.$contents.'</p>');

    ?>
  </section>
</body>
</html>