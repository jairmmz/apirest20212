<?php
$router->get('/', ['uses' => 'IndexController@actionIndex']);

$router->post('language/insert', ['uses' => 'LanguageController@actionInsert']);

$router->get('ShowLanguage', ['uses' => 'LanguageController@actionShowLanguage']);
$router->get('language/delete/{idLanguage}',['uses' => 'LanguageController@actionDelete']);
$router->post('language/update',['uses' => 'LanguageController@actionUpdate']);

?>



