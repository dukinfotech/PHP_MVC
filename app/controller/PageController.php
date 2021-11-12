<?php
    namespace App\Controller;
    use Core\BaseController;

    class PageController extends BaseController
    {
        public function home() {
            view('pages/home');
        }

        public function dashboard() {
            if (isset($_SESSION['user'])) {
                view('pages/dashboard', [], false, 'admin');
            } else {
                header('Location: /');
            }
        }
    }