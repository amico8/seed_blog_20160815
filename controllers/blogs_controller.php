<?php

  require('models/blog.php');

  // コントローラのクラスをインスタンス化
  $controller = new BlogsController();

  // アクション名によって、呼び出すメソッドを変える
  switch ($action) {
    case 'index':
        $controller->index();
        break;
    case 'show':
        $controller->show($id);
        break;
    case 'add':
        $controller->add();
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

    function show($id) {
      $blog = new Blog();
      $viewOptions = $blog->show($id);
      $action = 'show';

      require('views/layout/application.php');
    }

    function add() {
      $action = 'add';
      require('views/layout/application.php');
    }
  }
?>