<?php
require_once('dbc.php');

$komento = $_POST;

// empty 変数が空であるかどうかを検査
// exit メッセージを出力、現在のスクリプトを終了
// mb_strlen 文字の長さを取得

// 投稿者
if(empty($komento['view_name'])) {
  exit('投稿者名を入力してください');
}

if(mb_strlen($komento['view_name']) > 100) {
  exit('文字数は100文字以下にしてください');
}

// 投稿メッセージ
if(empty($komento['comment'])) {
  exit('メッセージを入力してください');
}

if(mb_strlen($komento['comment']) > 140) {
  exit('文字数は140文字以下にしてください');
}

$sql = "INSERT INTO
              message(view_name, comment)
        VALUES
              (:view_name, :comment)";

$dbh = dbConnect();
$dbh->beginTransaction(); // トランザクション開始①トランザクション

// データを入れる際にはエラーが起きやすいからtry&catchを使うべし
try {
  $stmt = $dbh->prepare($sql);
  $stmt->bindValue(':view_name',$komento['view_name'], PDO::PARAM_STR);
  $stmt->bindValue(':comment',$komento['comment'], PDO::PARAM_STR);
  $stmt->execute();
  $dbh->commit(); // 実行が終わった後にコミット②トランザクション
  echo 'メッセージの投稿ができました！';
} catch (PDOException $e) {
  $dbh->rollBack(); // DBを処理実行前の状態に巻き戻し③トランザクション
  exit($e);
};

?>