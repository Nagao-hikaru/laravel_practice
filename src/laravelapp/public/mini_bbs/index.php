<?php
session_start();
require('dbconnect.php');

if (isset($_SESSION['id']) && $_SESSION['time'] + 3600 > time()) {
  $_SESSION['time'] = time();

  $members = $db->prepare('SELECT * FROM members WHERE id=?');
  $members->execute(array(
    $_SESSION['id'],
  ));
  $member = $members->fetch();
} else {
  header('Location : login.php');
  exit();
}

if (!empty($_POST)) {
  if ($_POST['message'] !== '') {
    $message = $db->prepare('INSERT INTO posts SET member_id=?, message=?, message_reply_id=?, created_at=NOW()');
    $message->execute(array(
      $member['id'],
      $_POST['message'],
      $_POST['reply_post_id'],
    ));

    header('Location: index.php');
    exit();
  }
}

$posts = $db->query('SELECT posts.id, members.picture, members.name, posts.message, posts.created_at, posts.message_reply_id, posts.member_id FROM members left join posts on members.id=posts.member_id order by posts.created_at desc');

if (isset($_REQUEST['res'])) {
  // 返信の処理
  $response = $db->prepare('SELECT * FROM posts WHERE posts.id=?');
  $response->execute(array($_REQUEST['res']));
  $res = $response->fetch();
  $men = $db->prepare('SELECT * FROM members WHERE members.id=?');
  $men->execute(array($res['member_id']));
  $contributor = $men->fetch();

  $message = '@' . $contributor['name'] . '' . $res['message'];
}

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
  	<div style="text-align: right"><a href="logout.php">ログアウト</a></div>
    <form action="" method="post">
      <dl>
        <dt><?php print($member['name'])?>さん、メッセージをどうぞ</dt>
        <dd>
          <textarea name="message" cols="50" rows="5"><?php print(htmlspecialchars($message, ENT_QUOTES))?></textarea>
          <input type="hidden" name="reply_post_id" value="<?php print(htmlspecialchars($_REQUEST['res'], ENT_QUOTES)); ?>" />
        </dd>
      </dl>
      <div>
        <p>
          <input type="submit" value="投稿する" />
        </p>
      </div>
    </form>

<?php foreach($posts as $post): ?>
    <div class="msg">
    <img src="member_picture/<?php htmlspecialchars(print($post['picture']), ENT_QUOTES) ;?>" width="48" height="48" alt="<?php htmlspecialchars(print($post['name']), ENT_QUOTES) ;?>" />
    <p><?php htmlspecialchars(print($post['message']), ENT_QUOTES) ;?><span class="name">（<?php htmlspecialchars(print($post['name']), ENT_QUOTES) ;?>）</span>[<a href="index.php?res=<?php print(htmlspecialchars($post['id'], ENT_QUOTES))?>">Re</a>]</p>
    <p class="day"><a href="view.php?id=<?php print(htmlspecialchars($post['id'], ENT_QUOTES))?>"><?php htmlspecialchars(print($post['created_at']), ENT_QUOTES) ;?></a>
    <?php if ($post['message_reply_id'] > 0): ?>
      <a href="view.php?id=<?php htmlspecialchars(print($post['message_reply_id']), ENT_QUOTES) ;?>">
    返信元のメッセージ</a>
    <?php endif; ?>
    <?php if ($_SESSION['id'] == )?>
      [<a href="delete.php?id=<?php print(htmlspecialchars($post['id'], ENT_QUOTES)); ?>"
      style="color: #F33;">削除</a>]
<?php endforeach; ?>
    </p>
    </div>

<ul class="paging">
<li><a href="index.php?page=">前のページへ</a></li>
<li><a href="index.php?page=">次のページへ</a></li>
</ul>
  </div>
</div>
</body>
</html>
