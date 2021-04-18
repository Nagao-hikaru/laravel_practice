<!doctype html>
<html lang="ja">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="../css/style.css">

<title>PHP</title>
</head>
<body>
<header>
<h1 class="font-weight-normal">PHP</h1>    
</header>

<main>
<h2>Practice</h2>
<pre>
<?php

try {
    $dsn = 'mysql:host=practice_db1;dbname=laravel_db';
    $user = 'laravel_user';
    $password = 'laravel_pass';
    $pdo = new PDO($dsn, $user, $password);
    echo '接続成功';
} catch (PDOException $e){
    echo 'DB接続エラー' . $e->getMessage();
}

?>
</pre>
</main>
</body>    
</html>