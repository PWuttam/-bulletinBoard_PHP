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
      表示名：<br>
      <input type="text" name="personal_name"><br><br>
      投稿メッセージ：<br>
      <textarea name="contents" cols="40" rows="8"></textarea><br><br>
      <input type="submit" name="btn1" value="書き込む">
    </form>

  </section>
  <section>
    <h2>投稿一覧</h2>

    <?php

      if($_SERVER['REQUEST_METHOD'] === "POST") { // POSTだったら
        writeData();
      }

      function writeData(){ // function ユーザー定義関数
              $personal_name = $_POST['personal_name'];
              $contents = $_POST['contents'];
              $contents = nl2br($contents);

              // hrタグ 水平の横線を引く
              // ¥r¥n ファイルに書き込まれた時に見やすいよう各行毎に改行
              // ¥n 改行 ¥r キャリッジリターン
              // ¥r¥n エスケープ文字を有効にするため""で囲む必要

              $data = "<hr>\n";
              $data = $data . "<p>投稿者：" . $personal_name . "</p>\n";
              $data = $data . "<p>内容：</p>\n";
              $data = $data . "<p>" . $contents . "</p>\n";

              // txt 投稿された内容を保存するファイル
              $keijiban_file = 'keijiban.txt';

              // fopen ファイルやURLを開く
              // a 書き込みのみ ファイルがないと新規作成
              // b 強制的にバイナリモードにする
              $fp = fopen($keijiban_file, 'ab');

              // flock 指定したファイルをロックする関数
              // 成功した場合にTRUE  失敗したらFALSEを返す
              if ($fp) {
                if (flock($fp, LOCK_EX)) { // 排他ロック 読み書き両方禁止
                  if (fwrite($fp, $data) === FALSE) {
                    print ('ファイル書き込みに失敗しました');
                  }

                  flock ($fp, LOCK_UN); // ロックの破棄
                } else {
                  print ('ファイルロックに失敗しました');
                }
              }

              // fclose 指定したファイルを閉じる
              fclose($fp);
      }

    ?>
  </section>
</body>
</html>