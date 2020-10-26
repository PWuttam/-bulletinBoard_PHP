<?php

require_once('dbc.php');

$dbc = new Dbc();
$result = $dbc->getMessage($_GET['id']);

// $resultの内容を表示させてわかりやすいように
$id = $result['id'];
$view_name = $result['view_name'];
$post_at = $result['post_at'];
$comment = $result['comment'];

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>いぬねこ掲示板</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="犬と猫についての掲示板">
<meta name="keywords" content="キーワード１,キーワード２,キーワード３,キーワード４,キーワード５">
<link rel="stylesheet" href="css/style.css">
<script type="text/javascript" src="js/openclose.js"></script>
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>

<div id="container">

<header>
  <h1>いぬねこ掲示板</h1>
</header>

<nav id="menubar">
<ul>
<li><a href="index.php">Home</a></li>
<li><a href="https://twitter.com/pwuttam">About</a></li>
<li><a href="https://www.resume.id/uttam">Gallery</a></li>
</ul>
</nav>

  <section id="new">
    <h2>コメント更新フォーム</h2>
    <form action="message_update.php" method="POST">
      <input type="hidden" name="id" value="<?php echo $id ?>">
            <p>表示名：</p>
            <input type="text" name="view_name" value="<?php echo $view_name ?>"><br><br>
            <p>投稿メッセージ：</p>
            <textarea name="comment" id="comment" cols="30" rows="10"><?php echo $comment ?></textarea>
            <br>
            <input type="submit" value="更新"><br><br>
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
          <td><a href="/editing.php?id=<?php echo $column['id'] ?>">編集</a></td>
        </tr>
        <?php endforeach; ?>
      </table>
  </section>

  </div>
<!--/container-->

  <footer>
    <small>Copyright&copy; <a href="index.php">いぬねこ掲示板</a> All Rights Reserved.</small>
    <span class="pr">《<a href="http://template-party.com/" target="_blank">Web Design:Template-Party</a>》</span>
  </footer>

  <!--スマホ用更新情報　600px以下-->
    <script type="text/javascript">
    if (OCwindowWidth() <= 600) {
      open_close("newinfo_hdr", "newinfo");
    }
    </script>
</body>
</html>