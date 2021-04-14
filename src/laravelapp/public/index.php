<!doctype html>
<html lang="ja">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/style.css">

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

  // $today = new DateTime();
  // print($today->format('G時 i分 s秒'));

  // print($i);
  // for ($i = 1; $i<= 365; $i++) {
  //   print($i . "\n");
  // }
  // for文はwhile文と違って初期処理を引数でまとめることができる。
  // print(date('n/j(D)', time()));
  // timestampは秒数を表したもの

  
  $week_name = ['日', '月', '火', '水', '木', '金', '土'];
  print($week_name[0]);
      for ($i=1; $i<= 365; $i++) {
        $date = strtotime('+' .$i . 'day');
        print "\n";
      }


?>
</pre>
</main>
</body>    
</html>