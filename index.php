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
    <form action="send.php" method="post">
      名前：<input type="text" name="name" value=""><br>
      投稿内容：<input type="text" name="contents" value=""><br>
      <button type="submit">投稿</button>
    </form>
  </section>
</body>
</html>