  <?php
  try {
    $db = new PDO('mysql:dbname=wim-blog;host=127.0.0.1;charset=utf8', 'root', '');
  } catch (PDOException $e) {
    echo 'DB Connection Error: ' . $e->getMessage();
  }
?>