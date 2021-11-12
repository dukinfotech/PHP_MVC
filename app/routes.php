<?php
    $definedRoutes = [
        ['uri' => '/posts', 'controller' => 'PostController@index', 'method' => 'GET'],
        ['uri' => '/', 'controller' => 'PageController@home', 'method' => 'GET'],

        ['uri' => '/register', 'controller' => 'UserController@showRegister', 'method' => 'GET'],
        ['uri' => '/register', 'controller' => 'UserController@register', 'method' => 'POST'],
        ['uri' => '/login', 'controller' => 'UserController@showLogin', 'method' => 'GET'],
        ['uri' => '/login', 'controller' => 'UserController@login', 'method' => 'POST'],
        ['uri' => '/logout', 'controller' => 'UserController@logout', 'method' => 'GET'],

        ['uri' => '/admin', 'controller' => 'PageController@dashboard', 'method' => 'GET'],
        ['uri' => '/admin/posts/create', 'controller' => 'PostController@create', 'method' => 'GET'],
        ['uri' => '/admin/posts/create', 'controller' => 'PostController@store', 'method' => 'POST'],
        ['uri' => '/admin/posts', 'controller' => 'PostController@index', 'method' => 'GET'],
    ];