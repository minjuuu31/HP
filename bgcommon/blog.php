<?php
require_once 'dbconnect.php';

if(isset($_REQUEST['page']) && is_numeric($_REQUEST['page'])) {
  $page = $_REQUEST['page'];
} else {
  $page = 1;
}
$start = 5*($page-1);
$posts = $db->prepare('SELECT * FROM post ORDER BY no LIMIT ?, 5');
$posts->bindParam(1, $start, PDO::PARAM_INT);
$posts->execute();
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
  <nav id="what_is_minju"><a href="../index.html">WHAT IS MINJU</a></nav>
  <div class="header_nav">
    <div class="icon"><a href="../prof.html">PROFILE</a></div>
    <div class="icon"><a href="../criate.html">CRIATE</a></div>
    <div class="icon_now">BLOG</div>
    <div class="icon"><a href="../mov.html">MOVIE</a></div>
    <div class="icon"><a href="../contact.php">CONTACT</a></div>
  </div>
</header>

<main id="main">
  <div id="articleBox">
    <?php while($post = $posts->fetch()): ?>
        <li class="article-inner">
          <a href="inner.php?no=<?php echo $post['no']; ?>">
            <p class="a-D">diary: <?php echo($post['criate']); ?></p>
            <p class="a-T">
              <?php echo(mb_substr($post['title'], 0, 30)); ?>
              <?php echo((mb_strlen($post['title'])> 30 ? '...' : '')); ?>
            </p>
            <p class="a-C">comment (1)</p>
          </a>
        </li>
    <?php endwhile; ?>

    <div id="bg-PageBox">
        <?php if($page >=2): ?>
          <a href="blog.php?page=<?php echo($page-1); ?>"><i class="fas fa-chevron-left bg-pageIconLeft"></i><?php echo($page-1); ?></a>
        <?php endif; ?>
        
        <?php
          $counts = $db->query('SELECT COUNT(*) as cnt FROM post');
          $count = $counts->fetch();
          $maxPage = floor($count['cnt']/5)+1;
          if($page < $maxPage):
        ?>
          <a href="blog.php?page=<?php echo($page+1); ?>"><?php echo($page+1); ?><i class="fas fa-chevron-right bg-pageIcon"></i></a>
        <?php endif; ?>
    </div>

    </div>
    
</main>

</body>
</html>
