<?php
use Core\Exception;

function view($viewPath, $data = [], $core = false, $layout = null) {
    $viewFile = null;
    if (! $layout) {
        $layoutFilePath = $_SERVER['DOCUMENT_ROOT'] . '/app/view/layouts/master.php';
    } else {
        $layoutFilePath = $_SERVER['DOCUMENT_ROOT'] . '/app/view/layouts/' . $layout . '.php';
    }

    ob_start();
    include $layoutFilePath;
    $layoutCode = ob_get_clean();

    if ($core) {
        $viewFile = $_SERVER['DOCUMENT_ROOT'] . '/core/view/'.$viewPath.'.php';
    } else {
        $viewFile = $_SERVER['DOCUMENT_ROOT'] . '/app/view/'.$viewPath.'.php';
    }
    if (file_exists($viewFile)) {
        extract($data);
        
        ob_start();
        include $viewFile;
        $viewCode = ob_get_clean();


        $regex = '/^@title=\'([a-zA-Z]+)\'.+/m';
        preg_match_all($regex, $viewCode, $matches, PREG_SET_ORDER, 0);
        // If has @title='' in view
        if (count($matches) > 0) {
            $viewCode = str_replace($matches[0][0], '', $viewCode);
            $title = $matches[0][1];
        } else {
            $title = '';
        }

        $layoutCode = str_replace('@title', $title, $layoutCode);

        if (isset($_SESSION['error_once'])) {
            unset($_SESSION['error_once']);
        }

        $html = str_replace('@body', $viewCode, $layoutCode);
        die($html);
        
    } else {
        new Exception('View ' . $viewFile . ' Not Found', 404);
    }
}