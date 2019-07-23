<?php
require_once 'dbconnect.php';

$posts = $db->prepare('SELECT * FROM post WHERE no=?');
$posts->execute(array($_REQUEST['no']));
$post = $posts->fetch();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
 <meta charset="UTF-8">
 <meta name="Content-Style-Type" content="text/css">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
 <link rel="stylesheet" href="../css/blog.css">
 <title>BLOG-WHAT IS MINJU</title>
</head>
<body>
<header class="header">
  <nav id="what_is_minju"><a href="index.html">WHAT IS MINJU</a></nav>
  <div class="header_nav">
    <div class="icon"><a href="prof.html">PROFILE</a></div>
    <div class="icon"><a href="criate.html">CRIATE</a></div>
    <div class="icon_now">BLOG</div>
    <div class="icon"><a href="mov.html">MOVIE</a></div>
    <div class="icon"><a href="contact.php">CONTACT</a></div>
  </div>
</header>

<main id="main">
  <div id="innerBox">
    <p id="inner-D"><?php echo $post['criate']; ?></p>
    <p id="inner-T"><?php echo $post['title']; ?></P>
    <pre id="inner-M"><?php echo $post['memo']; ?></pre>
  </div>

  <a href="blog.php" id="inner-Re"><i class="fas fa-angle-left inner-icon"></i>Back</a>
</main>

</body>
</html>
