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
    $builder->connect('/session-object',['controller'=>'Sessions','action'=>'index']);
    $builder->connect('/session-read',['controller'=>'Sessions','action'=>'retrieve_session_data']);
    $builder->connect('/session-write',['controller'=>'Sessions','action'=> 'write_session_data']);
    $builder->connect('/session-check',['controller'=>'Sessions','action'=>'check_session_data']);
    $builder->connect('/session-delete',['controller'=>'Sessions','action'=>'delete_session_data']);
    $builder->connect('/session-destroy',['controller'=>'Sessions','action'=>'destroy_session_data']);
        
    // Fallback routes
    $builder->fallbacks();
});