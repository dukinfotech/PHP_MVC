<?php
use Core\Exception;

function view($viewPath, $data = [], $core = false) {
    $viewFile = null;
    if ($core) {
        $viewFile = $_SERVER['DOCUMENT_ROOT'] . '/core/view/'.$viewPath.'.php';
    } else {
        $viewFile = $_SERVER['DOCUMENT_ROOT'] . '/app/view/'.$viewPath.'.php';
    }
    if (file_exists($viewFile)) {
        extract($data);
        
        ob_start();
        include $viewFile;

        $output = ob_get_clean();
        die($output);

    } else {
        $x = new Exception('View ' . $viewFile . ' Not Found', 404);
        var_dump($x);
    }
}