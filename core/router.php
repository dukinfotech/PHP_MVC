<?php
    // Get uri from browser
    $requestUri = $_SERVER['REQUEST_URI'];

    $routeNotFound = true;
    $routeController = null;
    foreach ($definedRoutes as $definedRoute) {
        if ($requestUri === $definedRoute['uri']) {
            $routeNotFound = false;
            $routeController = $definedRoute['controller'];
            break;
        }
    }


    // Require .php file and call method
    try {
        if ($routeNotFound) {
            throw new Exception('Route ' . $requestUri . ' Not Found', 404);
        } else {
            $array = explode('@', $routeController);
            $controllerName = $array[0];
            $methodName = $array[1];

            // Handle Model (optional)
            $modelName = substr($controllerName, 0, strlen($controllerName) - 10);
            $modelFile = $_SERVER['DOCUMENT_ROOT'] . '/app/model/'.$modelName.'.php';
            if (file_exists($modelFile)) {
                require_once $modelFile;
            }
            
            // Handle controller (required)
            $controllerFile = $_SERVER['DOCUMENT_ROOT'] . '/app/controller/'.$controllerName.'.php';
            if (file_exists($controllerFile)) {
                require_once $controllerFile;

                // Create object from routes
                $controllerClass = 'App\Controller\\'.$controllerName;
                if (class_exists($controllerClass)) {
                    $instance = new $controllerClass();
                    if (method_exists($instance, $methodName)) {
                        $instance->{$methodName}();                     
                    } else {
                        throw new Exception('Method ' . $methodName . ' Not Found', 404);
                    }
                } else {
                    throw new Exception('Class ' . $controllerName . ' Not Found', 404);
                }
            } else {
                throw new Exception('File ' . $controllerFile . ' Not Found', 404);
            }
        }
    } catch (Exception $e) {
        new Core\Exception($e->getCode(), $e->getMessage());
    }
