<?php

$router = $di->getRouter();

// Define your routes here 

// $router->add('/example', [
//   'controller' => 'example',
//   'action' => 'index'
// ]);

$router->addGet('/patients', [
  'controller' => 'patients',
  'action' => 'index'
]);

$router->addGet('/patients/{id:[0-9]+}', [
  'controller' => 'patients',
  'action' => 'second'
]);

$router->addPost('/patients', [
  'controller' => 'Patients',
  'action' => 'create'
]);

$router->add('/patients/{id:[0-9]+}', [
  'controller' => 'patients',
  'action' => 'delete',
])->via(['DELETE']);

$router->add('/patients/{id:[0-9]+}', [
  'controller' => 'patients',
  'action' => 'update',
])->via(['PUT']);

$router->handle($_SERVER['REQUEST_URI']);
