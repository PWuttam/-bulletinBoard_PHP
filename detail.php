<?php

require_once('dbc.php');

$dbc = new Dbc();
$result = $dbc->getMessage($_GET['id']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>メッセージ詳細</title>
</head>
<body>
  <h2>メッセージ詳細</h2>
  <h3>投稿者：<?php echo $result['view_name'] ?></h3>
  <p>投稿日：<?php echo $result['post_at'] ?></p>
  <hr>
  <p>内容：<?php echo $result['comment'] ?></p>

</body>
</html>