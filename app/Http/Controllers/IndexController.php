<?php
    namespace App\Http\Controllers;

    class IndexController extends Controller{
        public function __contruct(){}
        public function actionIndex(){

            $people = [
                'firtName' => 'Jairo',
                'surName' => 'Muñoz Miranda',
                'birthDate' => '2021-02-02'
            ];

            return response()->json($people);

        }
    }
?>