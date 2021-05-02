<?php
session_start();

require('dbconnect.php');

if (empty($_REQUEST['id'])) {
  header('Location: index.php');
  exit();
}
$posts = $db->prepare('SELECT * FROM posts WHERE posts.id=?');
$posts->execute(array($_REQUEST['id']));
$post = $posts->fetch();

$members = $db->prepare('SELECT * FROM members WHERE members.id=?');
$members->execute(array($post['member_id']));
$member = $members->fetch();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>ひとこと掲示板</title>

	<link rel="stylesheet" href="style.css" />
</head>

<body>
<div id="wrap">
  <div id="head">
    <h1>ひとこと掲示板</h1>
  </div>
  <div id="content">
  <p>&laquo;<a href="index.php">一覧にもどる</a></p>

  <?php if (isset($post)) :?>
    <div class="msg">
    <img src="member_picture/<?php print(htmlspecialchars($member['picture'])); ?>" />
    <p><?php print(htmlspecialchars($post['message'])); ?><span class="name">（<?php print(htmlspecialchars($member['name'])); ?>）</span></p>
    <p class="day"><?php print(htmlspecialchars($post['created_at'])); ?></p>
    </div>
  <?php else: ?>
    <p>その投稿は削除されたか、URLが間違えています</p>
  <?php endif; ?>
  </div>
</div>
</body>
</html>
