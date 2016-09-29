<?php
  class Blog {

    // プロパティ
    private $dbconnect = '';

    // コンストラクタ
    function __construct() {
      // DB接続ファイルを読み込む
      require('dbconnect.php');

      // DB接続設定の値をプロパティに代入
      $this->dbconnect = $db;
    }

    function index() {
      // SQLの実行
      $sql = 'SELECT * FROM `blogs` WHERE `delete_flag` = 0';
      $results = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));

      $rtn = array();
      while ($result = mysqli_fetch_assoc($results)) {
        $rtn[] = $result;
      }
      // 取得結果を返す
      return $rtn;
    }

  }
?>