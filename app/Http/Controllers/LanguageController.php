<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TLanguage;

class LanguageController extends Controller
{
	public function actionInsert(Request $request)
	{
		try {
			// validator of Laravel.
			$x = TLanguage::whereRaw("replace(name,' ','')=replace(?,' ','')",[$request->input('name')])->first();

			if ($x != null) {		
			$this->_so->mo->message='El nombre ingresado del lenguaje de programación ya existe.';
			return response()->json($this->_so);
			}

			$tLanguage=new TLanguage();

			$tLanguage->idLanguage=uniqid();
			$tLanguage->name=trim($request->input('name'));
	
			$tLanguage->save();
	
			$this->_so->mo->success();
			$this->_so->mo->message='Operación realizada correctamente.';
	
			return response()->json($this->_so);
			
		} catch (\Exception $e) {
			$this->_so->mo->message='Ocurrio un error inesperado.';
			$this->_so->mo->exception();
	
			return response()->json($this->_so);	
		}
	}
}
?>
