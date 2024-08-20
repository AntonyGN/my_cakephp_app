<?php
use Cake\Http\Middleware\CsrfProtectionMiddleware;
use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;
$routes->setRouteClass(DashedRoute::class);
$routes->scope('/', function (RouteBuilder $builder) {
   $builder->registerMiddleware('csrf', new CsrfProtectionMiddleware([
      'httponly' => true,
   ]));
   $builder->applyMiddleware('csrf');
   $builder->connect('/element-example',['controller'=>'Elems','action'=>'index']);
   $builder->fallbacks();
});
