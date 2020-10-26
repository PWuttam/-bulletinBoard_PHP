<?php
require_once('dbc.php');

$komento = $_POST;

function messageValidate($komento) {
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
}

$dbc = new Dbc(); // インスタンス化
$dbc->messageUpdate($komento);

?>