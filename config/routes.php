<?php
use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

return function (RouteBuilder $routes): void {
    $routes->setRouteClass(DashedRoute::class);

    // Default Pages routes
   $routes->scope('/', function (RouteBuilder $builder): void {
    $builder->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);
    $builder->connect('/pages/*', 'Pages::display');

    // ✅ Must come BEFORE fallback
    $builder->connect(
        '/societies/view/:id',
        ['controller' => 'Societies', 'action' => 'view']
    )
    ->setPass(['id'])
    ->setPatterns(['id' => '\d+']);

    // ⚠️ Keep fallback LAST
    $builder->fallbacks(DashedRoute::class);
});

    $routes->connect('/dashboard', ['controller' => 'Dashboard', 'action' => 'index']);

    // -------------------------------
    // Societies Routes
    // -------------------------------
    // $routes->connect('/societies/view/:id', ['controller' => 'Societies', 'action' => 'view'])
    //     ->setPass(['id'])->setPatterns(['id' => '\d+']);
    $routes->connect('/societies', ['controller' => 'Societies', 'action' => 'index']);
    $routes->connect('/societies/add', ['controller' => 'Societies', 'action' => 'add']);
    $routes->connect('/societies/edit/:id', ['controller' => 'Societies', 'action' => 'edit'])
        ->setPass(['id'])->setPatterns(['id' => '\d+']);
    

    // -------------------------------
    // Wings Routes
    // -------------------------------
    $routes->connect('/wings', ['controller' => 'Wings', 'action' => 'index']);
    $routes->connect('/wings/add', ['controller' => 'Wings', 'action' => 'add']);
    // $routes->connect('/wings/edit/:id', ['controller' => 'Wings', 'action' => 'edit'])
    //     ->setPass(['id'])->setPatterns(['id' => '\d+']);
    // $routes->connect('/wings/view/:id', ['controller' => 'Wings', 'action' => 'view'])
    //     ->setPass(['id'])->setPatterns(['id' => '\d+']);

    // -------------------------------
    // Flats Routes
    // -------------------------------
    // $routes->connect(
    //     '/flats/view/:id',
    //     ['controller' => 'Flats', 'action' => 'view'],
    //     ['pass' => ['id'], 'id' => '\d+']
    // );
    // $routes->connect(
    //     '/flats/edit/:id',
    //     ['controller' => 'Flats', 'action' => 'edit'],
    //     ['pass' => ['id'], 'id' => '\d+']
    // );
    // $routes->connect(
    //     '/flats/delete/:id',
    //     ['controller' => 'Flats', 'action' => 'delete'],
    //     ['pass' => ['id'], 'id' => '\d+']
    // );

    // Optionally, your index/add routes (optional)
    $routes->connect('/flats', ['controller' => 'Flats', 'action' => 'index']);
    $routes->connect('/flats/add', ['controller' => 'Flats', 'action' => 'add']);

    // -------------------------------
    // Maintenance Fees Routes
    // -------------------------------
    $routes->connect('/fees', ['controller' => 'MaintenanceFees', 'action' => 'index']);
    $routes->connect('/fees/add', ['controller' => 'MaintenanceFees', 'action' => 'add']);
    $routes->connect('/fees/edit/:id', ['controller' => 'MaintenanceFees', 'action' => 'edit'])
        ->setPass(['id'])->setPatterns(['id' => '\d+']);
    $routes->connect('/fees/view/:id', ['controller' => 'MaintenanceFees', 'action' => 'view'])
        ->setPass(['id'])->setPatterns(['id' => '\d+']);

    // -------------------------------
    // Payments Routes
    // -------------------------------
    $routes->connect('/payments', ['controller' => 'Payments', 'action' => 'index']);
    $routes->connect('/payments/add', ['controller' => 'Payments', 'action' => 'add']);
    $routes->connect('/payments/edit/:id', ['controller' => 'Payments', 'action' => 'edit'])
        ->setPass(['id'])->setPatterns(['id' => '\d+']);
    $routes->connect('/payments/view/:id', ['controller' => 'Payments', 'action' => 'view'])
        ->setPass(['id'])->setPatterns(['id' => '\d+']);

    // -------------------------------
    // Optional WhatsApp Reminder Route
    // -------------------------------
    $routes->connect('/fees/send-reminder/:id', ['controller' => 'MaintenanceFees', 'action' => 'sendReminder'])
        ->setPass(['id'])->setPatterns(['id' => '\d+']);
};
