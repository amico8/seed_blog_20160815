<?php

  require('models/blog.php');

  // コントローラのクラスをインスタンス化
  $controller = new BlogsController();

  // アクション名によって、呼び出すメソッドを変える
  switch ($action) {
    case 'index':
        $controller->index();
        break;
    default:
        break;
  }

  class BlogsController {
    function index() {
      // モデルを呼び出す
      $blog = new Blog();
      $viewOptions = $blog->index();
      $action = 'index';

      require('views/layout/application.php');
    }
  }
?>