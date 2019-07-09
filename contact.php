<?php
  header('Content-type: text/html; charset=utf-8');

  const COMMON_FILE = 'mfcommon/';
  require_once COMMON_FILE . 'function.php';
  
  // 送信情報の受け取り
  $name = (string)filter_input(INPUT_POST, 'name');
  $email = (string)filter_input(INPUT_POST, 'email');
  $inquiry = (string)filter_input(INPUT_POST, 'inquiry');

?>
<!DOCTYPE html>
<html lang="ja">
<head>
 <meta charset="UTF-8">
 <meta name="Content-Style-Type" content="text/css">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <link rel="stylesheet" href="css/contact.css">
 <title>CONTACT - WHAT IS MINJU</title>
</head>
<!-- body -->
<body>
  <!-- header -->
<header class="header">
  <nav id="what_is_minju"><a href="index.html">WHAT IS MINJU</a></nav>
  <div class="header_nav">
   <div class="icon"><a href="prof.html">PROFILE</a></div>
   <div class="icon"><a href="blog.html">BLOG</a></div>
   <div class="icon_now">CONTACT</div>
   <div class="icon"><a href="criate.html">CRIATE</a></div>
   <div class="icon"><a href="mov.html">MOVIE</a></div>
 </div>
</header>
 
<!-- main -->
<main class="main">
  <p>※現在、日本語ページでのみ対応可能です。
    <br>Please contact us by email using this form, Because I'm editing the page of English.  
    <br>
  </p>
  <form action="confirm.php" method="post">
    
    <div class="main_box">
         <div class="name_box">
            <label for="name" class="name">NAME：</label>
            <input type="text" class="form_name" name="name" maxlength="20" value="<?php echo h($name); ?>">
         </div>

         <div class="mail_box">
            <label for="mail">Email：</label>
            <input type="text" class="form_mail" name="email" maxlength="50" value="<?php echo h($email); ?>">
         </div>

         <div class="msg_box">
            <label for="msg" class="msg">MESSAGE：</label>
            <textarea class="msg02" name="inquiry" rows="5" value="<?php echo h($inquiry); ?>"></textarea>
         </div>
    </div>

    <div>
      <button type="submit" id="button">Confirm a message</button>
    </div>
  </form>
  
</main>

<!-- footer -->
<footer>

</footer>

</body>
</html>
