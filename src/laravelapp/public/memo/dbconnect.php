<?php

try {
    $dsn = 'mysql:host=practice_db1;dbname=laravel_db';
    $user = 'laravel_user';
    $password = 'laravel_pass';
    $db = new PDO($dsn, $user, $password);
    echo '接続成功';
} catch (PDOException $e){
    echo 'DB接続エラー' . $e->getMessage();
}