<?php

require 'Request.php';
require 'BookController.php';
require 'DefaultController.php';
require 'FeedbackController.php';

$request = new Request($_GET, $_POST);

$controller = $request->get('controller', 'default');
$action = $request->get('action', 'index');

$controller = ucfirst($controller) . 'Controller';
$action .= 'Action';

if (!file_exists($controller . '.php')) {
    die("{$controller} not found");
}

$controller = new $controller();

if (!method_exists($controller, $action)) {
    die("{$action} not found");
}

$content = $controller->$action();

require 'layout.phtml';