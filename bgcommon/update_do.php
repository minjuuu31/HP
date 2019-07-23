<?php
require_once 'dbconnect.php';

$title = $_POST['title'];
$memo = $_POST['memo'];
$no = $_POST['no'];
?>
<!DOCTYPE html>
<html lang="ja">
<head>
 <meta charset="UTF-8">
 <meta name="Content-Style-Type" content="text/css">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
 <link rel="stylesheet" href="../css/input.css">
 <title>BLOG-WHAT IS MINJU</title>
</head>
<body>
<header class="header">
<h1 id="blogBox">Blog</h1>
</header>
<div id="ipdBox">
    <p id="pre">
    <?php
      $statement = $db->prepare('UPDATE post SET title=?, memo=? WHERE no=?');
      $statement->execute(array($title, $memo, $no));
      echo '記事の内容を変更しました';
    ?>
    </p>

    <p class="ipd-Re"><a href="input.html"><i class="fas fa-angle-left ipd-icon"></i>Back</a></p>
    <p class="ipd-Re"><a href="../index.html"><i class="fas fa-angle-left ipd-icon"></i>Back HOME</a></p>
</div>
</body>
</html>
