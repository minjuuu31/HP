<?php
  header('Content-type: text/html; charset=utf-8');

  const COMMON_FILE = 'mfcommon/';
  require_once COMMON_FILE . 'function.php';

  //送信情報の受け取り
  $name = (string)filter_input(INPUT_POST, 'name');
  $email = (string)filter_input(INPUT_POST, 'email');
  $inquiry = (string)filter_input(INPUT_POST, 'inquiry');
    
  //入力必須項目の確認
  $message = '';
  if($name === ''){
   $message .= '<li>【NAME】が入力されていません。</li>';
  }
  if($email === ''){
   $message .= '<li>【Email】が入力されていません。</li>';
  } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
   $message .= '<li>【Email】が正しく入力されていません。</li>';
  }
  if($inquiry === '') {
      $message .= '【MESSAGE】の入力をお願いします。';
  }

  // 確認画面とエラー画面の振り分け
  if ($message !== '') {
    echo '<ul>';
    echo $message;
    echo '</ul>';
  }
  exit;
?>
<!DOCTYPE html>
<html lang="ja">
<head>
 <meta charset="UTF-8">
 <meta name="Content-Style-Type" content="text/css">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <link rel="stylesheet" href="css/confirm.css">
 <title>CONTACT - Confirm</title>
</head>
<!-- body -->
<body>
  <!-- header -->
<header class="header">
  <h1 id="what_is_minju"><a href="index.html">WHAT IS MINJU</a></h1>
</header>
 
<main id="main">
    <h2>お問合せ確認画面</h2>
    <p id="conf-p">※入力内容にお間違いがないか確認いただき、問題なければ［Send］ボタンを、修正<br>される場合は［Return］ボタンを押してください。</p>

    <div id="form-box">
         <div class="form-list">
             <p class="form-item">NAME:</p>
             <p class="input-item"><?php echo h($name); ?></p>
         </div>

         <div class="form-list">
             <p class="form-item">Email:</p>
             <p class="input-item"><?php echo h($email); ?></p>
         </div>

         <div class="form-list" id="msg-bottom">
             <p class="form-item input-item" id="msg">MESSAGE:</p>
             <p id="input-msg"><?php echo h($inquiry); ?></p>
         </div>

         <div id="button-box">
            <form action="contact.html" method="post" id="btn-left">
                <input type="submit" value="Return" class="btn">
            </form>
            <form action="mfcommon/send.php" method="post">
                    <input type="hidden" name="name" value="<?php echo h($name); ?>">
                    <input type="hidden" name="email" value="<?php echo h($email); ?>">
                    <input type="hidden" name="inquiry" value="<?php echo h($inquiry); ?>">
                    <input type="submit" value="Send" class="btn" id="send">
            </form>
         </div>
    </div>
</main>

<!-- footer -->
<footer>
    <small id="footer-p">&copy; 2019 takeda</small>
</footer>
</body>
</html>
