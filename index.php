<?php

spl_autoload_register(function($className) {
    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';
    
    require $className;
});

$request = new \Model\Request($_GET, $_POST);

$controller = $request->get('controller', 'default');
$action = $request->get('action', 'index');

$controller =  ucfirst($controller) . 'Controller';
$action .= 'Action';

if (!file_exists('Controller/' . $controller . '.php')) {
    die("{$controller} not found");
}

$controller = '\\Controller\\' . $controller;
$controller = new $controller();

if (!method_exists($controller, $action)) {
    die("{$action} not found");
}

$content = $controller->$action();

require 'View/layout.phtml';