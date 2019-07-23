<?php
require_once 'dbconnect.php';

$title = $_POST['title'];
$memo = $_POST['memo'];
$criate = date('Y-m-d H:i');
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
    <pre id="pre">
    <?php
      $statement = $db->prepare("INSERT INTO post(title, memo, criate) VALUES('$title', '$memo', '$criate')");
      $statement->execute(array('$title', '$memo', '$criate'));
      echo 'メッセージが登録されました';
    ?>
    </pre>

    <p class="ipd-Re"><a href="input.html"><i class="fas fa-angle-left ipd-icon"></i>Back</a></p>
    <p class="ipd-Re"><a href="../index.html"><i class="fas fa-angle-left ipd-icon"></i>Back HOME</a></p>
</div>
</body>
</html>
