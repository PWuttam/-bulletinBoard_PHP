<?php

require_once('dbc.php');

//取得したデータを表示
$messageData = getAllMessage();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>いぬねこ掲示板</title>
</head>
<body>
  <h1>いぬねこ掲示板</h1>
  <section>
    <h2>新規投稿</h2>
      <form action="message_create.php" method="POST">
          <p>表示名：</p>
          <input type="text" name="view_name">
          <p>投稿メッセージ：</p>
          <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
          <br><br>
          <input type="submit" value="書き込む">
      </form>
  </section>
  <section>
    <h2>投稿一覧</h2>
      <table>
        <tr>
          <th>投稿者</th>
          <th>投稿日</th>
          <th>内容</th>
        </tr>
        <?php foreach($messageData as $column): ?>
        <tr>
          <td><?php echo $column['view_name'] ?></td>
          <td><?php echo $column['post_at'] ?></td>
          <td><?php echo $column['comment'] ?></td>
          <td><a href="/detail.php?id=<?php echo $column['id'] ?>">詳細</a></td>
        </tr>
        <?php endforeach; ?>
      </table>
  </section>
</body>
</html>