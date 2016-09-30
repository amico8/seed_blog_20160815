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

    function show($id) {
      $sql = sprintf('SELECT * FROM `blogs` WHERE `id` = %d',
        mysqli_real_escape_string($this->dbconnect, $id)
      );
      $results = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));

      $result = mysqli_fetch_assoc($results);
      return $result;
    }

    function create($post) {
      $sql = sprintf('INSERT INTO `blogs`(`title`, `body`, `delete_flag`, `created`) VALUES ("%s", "%s", 0, now())',
        mysqli_real_escape_string($this->dbconnect, $post['title']),
        mysqli_real_escape_string($this->dbconnect, $post['body'])
      );
      mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
    }

    function edit($id) {
      $sql = sprintf('SELECT * FROM `blogs` WHERE `id` = %d',
        mysqli_real_escape_string($this->dbconnect, $id)
      );
      $results = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));

      $result = mysqli_fetch_assoc($results);
      return $result;
    }

    function update($id, $post) {
      $sql = sprintf('UPDATE `blogs` SET `title`="%s",`body`= "%s" WHERE `id` = %d',
        mysqli_real_escape_string($this->dbconnect, $post['title']),
        mysqli_real_escape_string($this->dbconnect, $post['body']),
        mysqli_real_escape_string($this->dbconnect, $id)
      );
      mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
    }
  }
?>