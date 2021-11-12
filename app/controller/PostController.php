<?php
    namespace App\Controller;
    use Core\BaseController;
    use App\Model\Post;

    class PostController extends BaseController
    {
        public function __construct() {
            parent::__construct();
            if (! isset($_SESSION['user'])) {
                header('Location: /');
            }
        }

        public function create() {
            view('posts/create', [], false, 'admin');
        }

        public function store() {
            $title = $_POST['title'];
            $content = $_POST['content'];
            
            if (isset($_FILES['image'])) {
                $image = $_FILES['image'];
                $imagePath = '/public/uploads/'.$image['name'];
                $uploadDir = $_SERVER['DOCUMENT_ROOT'] . $imagePath;
                if (! move_uploaded_file($image["tmp_name"], $uploadDir)) {
                    $_SESSION['error_once'] = 'Upload image failed';
                }
            }

            $post = new Post;
            $post->store([
                'title' => $title,
                'content' => $content,
                'image' => $imagePath ?? null
            ]);

            header('Location: /admin/posts');
        }

        public function index() {
            $post = new Post;
            $posts = $post->all();
            view('posts/index',['posts' => $posts], false, 'admin');
        }
    }