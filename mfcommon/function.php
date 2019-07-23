<?php
function h($str){
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

// 改行処理
function hbr($str) {
    return nl2br(htmlspecialchars($str, ENT_QUOTES, 'UTF-8'));
  }
  