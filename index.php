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

    <!-- POSTでnameとmessageが投げられている -->
    <form action="send.php" method="post">
      <label for="name">表示名：</label>
      <input type="text" id="name" name="name"><br>
      <label for="message">投稿メッセージ：</label>
      <input type="text" id="message" name="message"><br>
      <button type="submit">書き込む</button>
    </form>

  </section>
  <section>
    <h2>投稿一覧</h2>
    <p>投稿はまだありません</p>
  </section>
</body>
</html>