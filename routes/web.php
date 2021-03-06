<?php
$router->get('/', ['uses' => 'IndexController@actionIndex']);

// TLanguage
$router->post('language/insert', ['uses' => 'LanguageController@actionInsert']);
$router->get('show/language', ['uses' => 'LanguageController@actionShowLanguage']);
$router->get('language/delete/{idLanguage}',['uses' => 'LanguageController@actionDelete']);
$router->post('language/update', ['uses' => 'LanguageController@actionUpdate']);


// TPerson
$router->post('person/insert',['uses' => 'PersonController@actionInsert']);
$router->post('person/delete',['uses' => 'PersonController@actionDelete']);
$router->post('person/edit',['uses' => 'PersonController@actionEdit']);
$router->get('person/list/{numPagination}',['uses' => 'PersonController@actionListPagination']);
$router->post('person/getPersonLanguage', ['uses' => 'PersonController@actionGetPerson']);


// PRUEBA CON WITH
$router->get('person/getPerson', ['uses' => 'PersonController@actionGet']);

?>



