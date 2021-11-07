<?php
    namespace Core;

    class BaseController
    {
        public static function renderView($viewPath, $data) {
            $viewFile = $_SERVER['DOCUMENT_ROOT'] . '/app/view/'.$viewPath.'.php';
            if (file_exists($viewFile)) {
                extract($data);
                
                ob_start();
                include $viewFile;

                $output = ob_get_clean();
                die($output);

            } else {
                echo('View ' . $viewFile . ' Not Found');
            }
        }
    }