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
   $builder->connect('template',['controller'=>'Products','action'=>'view']);
   $builder->fallbacks();
});