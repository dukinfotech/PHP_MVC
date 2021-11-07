<?php
    namespace App\Controller;
    use Core\BaseController;
    use App\Model\Post;

    class PostController extends BaseController
    {
        public function index() {
            $post = new Post();
            $posts = $post->all();
            self::renderView('posts/index', ['posts' => $posts]);
        }
    }