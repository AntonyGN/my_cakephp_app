<?php
use Cake\Http\Middleware\CsrfProtectionMiddleware;
use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

$routes->setRouteClass(DashedRoute::class);

$routes->scope('/', function (RouteBuilder $builder) {
    // Register and apply CSRF middleware
    $builder->registerMiddleware('csrf', new CsrfProtectionMiddleware([
        'httponly' => true,
    ]));
    $builder->applyMiddleware('csrf');

    // Connect the root URL to a specific controller and action
    $builder->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);
    
    // Connect other routes
    $builder->connect('/users/add', ['controller' => 'Users', 'action' => 'add']);

    $builder->connect('/users', ['controller' => 'Users', 'action' => 'index']);

    $builder->connect('/users/edit', ['controller' => 'Users', 'action' => 'edit']);

    $builder->connect('/users/delete', ['controller' => 'Users', 'action' => 'delete']);
    
    // Fallback routes
    $builder->fallbacks();
});
