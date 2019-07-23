<?php
  header('Content-type: text/html; charset=utf-8');

  const COMMON_FILE = './mfcommon/';
  require_once COMMON_FILE . 'function.php';
  require_once COMMON_FILE . 'include/header.php';
  require_once COMMON_FILE . 'include/footer.php';


  //送信情報の受け取り
  $name = (string)filter_input(INPUT_POST, 'name');
  $email = (string)filter_input(INPUT_POST, 'email');
  $inquiry = (string)filter_input(INPUT_POST, 'inquiry');
    
  //入力必須項目の確認
  $message = '';
  if($name === ''){
   $message .= '<li>【NAME】が入力されていません。</li>'. PHP_EOL;
  }
  if($email === ''){
   $message .= '<li>【Email】が入力されていません。</li>'. PHP_EOL;
  } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
   $message .= '<li>【Email】が正しく入力されていません。</li>'. PHP_EOL;
  }
  if($inquiry === '') {
      $message .= '<li>【MESSAGE】の入力をお願いします。</li>'. PHP_EOL;
  }


// エラー画面出力用HTML-------------------------------------------------------
$error_html = '
        <h2>Please confirm the Error</h2>
        <p id="conf-p">入力内容に誤りがございます。[Return]ボタンを押して入力画面にお戻りください。</p>
        <ul class="conf-box">'
        . $message .
        '</ul>
        <form action="contact.php" method="post">
              <input type="hidden" name="name" value="' . h($name) . '">
              <input type="hidden" name="email" value="' . h($email) . '">
              <input type="hidden" name="inquiry" value="' . h($inquiry) . '">
          <div class="r-btn">
              <input type="submit" value="Return" class="btn-inner">
          </div>
        </form>
';

// 確認画面出力用HTML---------------------------------------------------------
$confirm_html = '
        <h2>お問合せ確認画面</h2>
        <p id="conf-p">※入力内容にお間違いがないか確認いただき、問題なければ［Send］ボタンを、修正<br>される場合は［Return］ボタンを押してください。</p>

        <div id="form-box">
          <div class="form-list">
              <p class="form-item">NAME:</p>
              <p class="input-item">' . h($name) . '</p>
          </div>

          <div class="form-list">
              <p class="form-item">Email:</p>
              <p class="input-item">' . h($email) . '</p>
          </div>

          <div class="form-list" id="msg-bottom">
              <p class="form-item input-item" id="msg">MESSAGE:</p>
              <p id="input-msg">' . h($inquiry) . '</p>
          </div>

          <div id="button-box">
              <form action="contact.php" method="post" id="btn-left">
                  <input type="hidden" name="name" value="' . h($name) . '">
                  <input type="hidden" name="email" value="' . h($email) . '">
                  <input type="hidden" name="inquiry" value="' . h($inquiry) . '">
                  <input type="submit" value="Return" class="btn">
              </form>

              <form action="send.php" method="post">
                  <input type="hidden" name="name" value="' . h($name) . '">
                  <input type="hidden" name="email" value="' . h($email) . '">
                  <input type="hidden" name="inquiry" value="' . h($inquiry) . '">
                  <input type="submit" value="Send" class="btn" id="send">
              </form>
          </div>
        </div>
';

  // 確認画面とエラー画面の振り分け--------------------------------------------
  if ($message !== '') {
    echo $header_html;
    echo $error_html;
    echo $footer_html;
  } else {
    echo $header_html;
    echo $confirm_html;
    echo $footer_html;
  }
  exit;
