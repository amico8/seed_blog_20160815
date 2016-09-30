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
    case 'create':
        $controller->create($post);
      break;
    case 'edit':
        $controller->edit($id);
      break;
    case 'update':
        $controller->update($id, $post);
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

    function create($post) {
      $blog = new Blog();
      $blog->create($post);

      // indexへ遷移
      header('Location: /seed_blog/blogs/index');
      exit();
    }

    function edit($id) {
      $blog = new Blog();
      $viewOptions = $blog->edit($id);
      $action = 'edit';

      require('views/layout/application.php');
    }

    function update($id, $post) {
      $blog = new Blog();
      $blog->update($id, $post);
    }
  }
?>