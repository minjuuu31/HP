<?php
  header('Content-type: text/html; charset=utf-8');
  mb_language('japanese');
  mb_internal_encoding('UTF-8');

  const COMMON_FILE = 'mfcommon/';

  $name = (string)filter_input(INPUT_POST, 'name');
  $email = (string)filter_input(INPUT_POST, 'email');
  $inquiry = (string)filter_input(INPUT_POST, 'inquiry');

  require_once COMMON_FILE . 'mail/mail_user.php';
  require_once COMMON_FILE . 'mail/mail_forme.php';

  //ユーザー宛
  const MAIL_USER_SUBJECT = 'お問合せありがとうございます';
  const MAIL_CLIENT = 'mao.jin.lily.3110@gmail.com';
  $success = mb_send_mail($email, MAIL_USER_SUBJECT, $body, "From:" . MAIL_CLIENT);


  //自分宛メール成形
  const MAIL_CLIENT_SUBJECT = 'お問合せが届きました';
  $success = mb_send_mail(MAIL_CLIENT, MAIL_CLIENT_SUBJECT, $body2, $email);


  header('Location: ./compleat.html');
  exit;