<?php
// 制限値（コメントは140文字以上の入力であった場合エラーとする）
$limit = 140;
// エラーメッセージ用変数
$errMsg = '';
// 入力された文字列の長さを取得する
$txtLength = mb_strlen($contents);
// コメント 指定の文字数以下かどうかチェックする
if ($limit < $txtLength) {
 // 制限値を以上の場合、エラーメッセージを設定
 $errMsg = 'コメントは140文字以内で入力して下さい';
}