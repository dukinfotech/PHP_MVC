<?php
    namespace App\Controller;
    use Core\BaseController;

    class PageController extends BaseController
    {
        public function home() {
            view('pages/home');
        }
    }