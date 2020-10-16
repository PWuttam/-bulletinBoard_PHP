<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>いぬねこ掲示板</title>
</head>
<body>
    <h1>いぬねこ掲示板</h1>
    <h2>新規投稿</h2>
    <form action="message_create.php" method="POST">
        <p>表示名：</p>
        <input type="text" name="personal_name">
        <p>投稿メッセージ：</p>
        <textarea name="content" id="content" cols="30" rows="10"></textarea>
        <br>
        <input type="submit" value="書き込む">
    </form>
    
</body>
</html>