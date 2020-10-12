<?php

// ユーザ定義関数①データベース接続
// 引数：なし
// 返り値：接続結果を返す（$dbh）エラーも返す
function dbConnect() {
    // dsn データソースネーム
    $dsn = 'mysql:host=localhost;dbname=inuneko_board;charset=utf8';
    // userとpassは初期設定ではrootになっているから変更
    $user = 'board_user';
    $pass = 'kelx,emgbql3s';

    // PDOとはPHP Date Objectのこと
    // これなら同じ関数でデータベース操作ができる

    // $dbhはデータベースハンドル よくこれを使う
    // new PDO 'PDO接続を呼び出す'

    try {
      //データベース接続
      $dbh = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      ]);
    } catch(PDOException $e) {
      echo '接続失敗' . $e->getMessage();
      exit();
    };

    return $dbh;
};

// ユーザ定義関数②データを取得
// 引数：なし
// 返り値：取得したデータを返す

function getAllMessage() {
    $dbh = dbConnect();
    // ①SQLの準備
    $sql = 'SELECT * FROM message'; // 全て取得
    // ②SQLの実行 
    $stmt = $dbh->query($sql); // query 問合せ
    // ③SQLの結果を受け取る
    $result = $stmt->fetchall(PDO::FETCH_ASSOC);
    return $result;
    $dbh = null; 
};

// 引数：$id
// 返り値：$result
function getMessage($id) {
    // IDがからの場合
    if(empty($id)) {
      exit('IDが不正です。');
    }

    $dbh = dbConnect();

    // SQL準備
        // プレスホルダー ↓↓↓
    $stmt = $dbh->prepare('SELECT * FROM message Where id = :id');
    $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT); // 3つ引数が必要
    // SQL実行
    $stmt->execute();
    // 結果を取得
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // falseで帰ってきた場合
    if(!$result) {
      exit('コメントがありません');
    }

    return $result;
};

?>