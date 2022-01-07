<?php
$router->get('/', ['uses' => 'IndexController@actionIndex']);

$router->post('language/insert', ['uses' => 'LanguageController@actionInsert']);
// <!-- $router->post('/', ['uses' => 'IndexController@actionIndex']); -->
?>



