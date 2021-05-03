<?php
session_start();
require('dbconnect.php');

if (isset($_SESSION['id'])) {
  $id = $_REQUEST['id'];

  $messages = $db->prepare('SELECT * from posts where id=?');
  $messages->execute(array($id));
  $message = $messages->fetch();

  if ($message['member_id'] == $_SESSION['id']) {
    $del = $db->prepare('DELETE from posts where id=?');
    $del->execute(array($id));
  }
}
header('Location: index.php');
exit();