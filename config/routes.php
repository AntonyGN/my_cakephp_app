<?php
use Cake\Http\Middleware\CsrfProtectionMiddleware;
use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

$routes->setRouteClass(DashedRoute::class);

$routes->scope('/', function (RouteBuilder $builder) {
    // Register scoped middleware for in scopes.
    $builder->registerMiddleware('csrf', new CsrfProtectionMiddleware([
        'httponly' => true,
    ]));
    $builder->applyMiddleware('csrf');

    // Update the route placeholders from colon-prefixed to braced
    $builder->connect('tests/{arg1}/{arg2}', ['controller' => 'Tests', 'action' => 'show'], ['pass' => ['arg1', 'arg2']]);

    $builder->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);

    $builder->fallbacks();
});
