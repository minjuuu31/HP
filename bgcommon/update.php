<?php
require_once 'dbconnect.php';

if(isset($_REQUEST['no']) && is_numeric($_REQUEST['no'])) {
  $no = $_REQUEST['no'];

  $posts = $db->prepare('SELECT * FROM post WHERE no=?');
  $posts->execute(array($no));
  $post = $posts->fetch();
  }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
 <meta charset="UTF-8">
 <meta name="Content-Style-Type" content="text/css">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <link rel="stylesheet" href="../css/input.css">
 <title>BLOG-WHAT IS MINJU</title>
</head>
<body>
<header class="header">
  <nav id="what_is_minju"><a href="../index.html">WHAT IS MINJU</a></nav>
  <div class="header_nav">
    <div class="icon"><a href="../prof.html">PROFILE</a></div>
    <div class="icon"><a href="../criate.html">CRIATE</a></div>
    <div class="icon_now"><a href="blog.php">BLOG</a></div>
    <div class="icon"><a href="../mov.html">MOVIE</a></div>
    <div class="icon"><a href="../contact.php">CONTACT</a></div>
  </div>
</header>

<main id="main">
  <h1 id="blogBox">Blog Edit</h1>

  <form action="update_do.php" id="u-F" method="post">
    <input type="hidden" name="no" value="<?php echo $no; ?>">
        <p class="b-T">title: <textarea name="title" cols="30" rows="1"><?php echo($post['title']); ?></textarea></p>
    <p class="b-T">memo:<br><textarea name="memo" cols="100" rows="80"><?php echo($post['memo']); ?></textarea></p>
    <button type="submit" id="button">OK</button>
  </form>

</main>

</body>
</html>
