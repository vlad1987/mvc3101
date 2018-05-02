<?php

$dsn = 'mysql:host=127.0.0.1;dbname=mvc1';
$pdo = new \PDO($dsn, 'root');
$id = 2;
$name = 'Object-based';
try {
    $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

    $res = $pdo->prepare('select * from category where id = ? and name = ?');
    $res->execute([
        $id,
        $name
    ]);
    
    // var_dump($data);
//     var_dump($pdo,$res, $data);
// $data = $res->fetch(\PDO::FETCH_ASSOC);

while ($data = $res->fetch(\PDO::FETCH_OBJ)) {
    var_dump($data);
}

} catch (\Exception $e) {
    echo $e->getMessage();
}































die;
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', __DIR__ . DS);
define('VIEW_DIR', ROOT . 'View' . DS);

spl_autoload_register(function($className) {
    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';
    
    require $className;
});

$request = new \Framework\Request($_GET, $_POST);
$router = new \Framework\Router();

$controller = $request->get('controller', 'default');
$action = $request->get('action', 'index');

$controller =  ucfirst($controller) . 'Controller';
$action .= 'Action';

try {
    if (!file_exists('Controller/' . $controller . '.php')) {
        throw new \Exception("{$controller} not found");
    }
    
    $controller = '\\Controller\\' . $controller;
    $controller = (new $controller())
        ->setRouter($router)
    ;
    
    if (!method_exists($controller, $action)) {
        throw new \Exception("{$action} not found");
    }
    
    $content = $controller->$action($request);   
} catch (\Exception $e) {
    // todo: create exception controller object
    // execute $content = $controller->errorAction()
    $content = $e->getMessage(); // todo: fix
}

require VIEW_DIR . 'layout.phtml';