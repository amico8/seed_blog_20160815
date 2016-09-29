<?php
  echo 'blogs_controller.phpが呼び出されました！<br>';

  require('models/blog.php');

  // コントローラのクラスをインスタンス化
  $controller = new BlogsController();
  $controller->index();

  class BlogsController {
    function index() {
      echo 'コントローラのindex()が呼び出されました！<br>';
      // モデルを呼び出す
      $blog = new Blog();
      $blog->index();
    }
  }
?>