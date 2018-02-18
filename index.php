<?php

/**
 * Autoloader
 */
spl_autoload_register(function ($class) {
  $root = __DIR__;   // get the parent directory
  $file = $root . '/' . str_replace('\\', '/', $class) . '.php';
  if (is_readable($file)) {
    require $root . '/' . str_replace('\\', '/', $class) . '.php';
  }
});

define("DS", DIRECTORY_SEPARATOR);
define("ROOT", getcwd() . DS);
define("APP_PATH", ROOT . 'App' . DS);
define("PUBLIC_PATH", ROOT . "public" . DS);

/**
 * Routing
 */
$router = new Core\Router();

// Add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('about', ['controller' => 'Home', 'action' => 'about']);
$router->add('discussion/page/{page:\d+}', ['controller' => 'Home', 'action' => 'discussion']);
$router->add('contact', ['controller' => 'Home', 'action' => 'contact']);
// $router->add('shop/post/{page:\d+}', ['controller' => 'Shop', 'action' => 'post']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');
// $router->add('{controller}/{id:\d+}/{action}/{page:\d+}');

$router->add('admin', ['controller' => 'Home', 'action' => 'index', 'namespace' => 'Admin']);
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);
$router->add('admin/{controller}/{id:\w+}/{action}', ['namespace' => 'Admin']);

$router->dispatch($_SERVER['QUERY_STRING']);
// // Display the routing table
// echo '<pre>';
// //var_dump($router->getRoutes());
// echo htmlspecialchars(print_r($router->getRoutes(), true));
// echo '</pre>';

// if ($router->match($url)) {
//   echo '<pre>';
//   var_dump($router->getParams());
//   echo '</pre>';
// } else {
//   echo "No route found for URL '$url'";
// }
