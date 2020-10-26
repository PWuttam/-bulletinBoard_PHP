<?php

// クラス化
Class Dbc
{
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
  }

  // ユーザ定義関数②データを取得
  // 引数：なし
  // 返り値：取得したデータを返す

  function getAllMessage() {
      // クラス内で別のfunctionを参照したい時 $this->
      $dbh = $this->dbConnect(); 
      // ①SQLの準備
      $sql = 'SELECT * FROM message'; // 全て取得
      // ②SQLの実行 
      $stmt = $dbh->query($sql); // query 問合せ
      // ③SQLの結果を受け取る
      $result = $stmt->fetchall(PDO::FETCH_ASSOC);
      return $result;
      $dbh = null; 
  }

  // 引数：$id
  // 返り値：$result
  function getMessage($id) {
      // IDが空の場合
      if(empty($id)) {
        exit('IDが不正です。');
      }

      $dbh = $this->dbConnect();

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
  }

  // 引数 $komento
  function messageCreate($komento) {
    $sql = "INSERT INTO
              message(view_name, comment)
        VALUES
              (:view_name, :comment)";

    $dbh = $this->dbConnect();
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
    }
  }

  function messageUpdate($komento) {
    $sql = "UPDATE message SET 
              view_name = :view_name, comment = :comment
            WHERE
              id = :id";
  
    $dbh = $this->dbConnect();
    $dbh->beginTransaction(); // トランザクション開始①トランザクション
  
    // データを入れる際にはエラーが起きやすいからtry&catchを使うべし
    try {
      $stmt = $dbh->prepare($sql);
      $stmt->bindValue(':view_name',$komento['view_name'], PDO::PARAM_STR);
      $stmt->bindValue(':comment',$komento['comment'], PDO::PARAM_STR);
      $stmt->bindValue(':id',$komento['id'], PDO::PARAM_INT);
      $stmt->execute();
      $dbh->commit(); // 実行が終わった後にコミット②トランザクション
      echo 'メッセージの更新をしました！';
    } catch (PDOException $e) {
      $dbh->rollBack(); // DBを処理実行前の状態に巻き戻し③トランザクション
      exit($e);
    }
  }
};

?>