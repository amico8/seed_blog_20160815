<?php
  // １．GETパラメータを取得
  // explode関数：第二引数の文字列を、第一引数の文字列で分解し、配列で返す関数。
  $params = explode('/', $_GET['url']);

  // ２．パラメータの分解
  $resouce = $params[0];
  $action = $params[1];
  $id = 0;
  if (isset($params[2])) {
    $id = $params[2];
  }

  // ３．コントローラの呼び出し
  require('controllers/'. $resouce .'_controller.php');
?>