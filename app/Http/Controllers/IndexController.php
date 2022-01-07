<?php
    namespace App\Http\Controllers;
    use App\Models\TLanguaje;
    use Illuminate\Support\Facades\DB;

class IndexController extends Controller{
        public function __contruct(){}
        public function actionIndex(){

            // DB::select('select * from t_language');
           // $listLanguage = TLanguaje::all();
            $saludo = "Hola mundo";
            // $people = [
            //     'firtName' => 'Jairo',
            //     'surName' => 'Muñoz Miranda',
            //     'birthDate' => '2021-02-02',
            //     'listLanguge' => $listLanguage
            // ];

            return response()->json($saludo);
        }
    }
?>