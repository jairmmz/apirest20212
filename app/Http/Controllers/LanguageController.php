<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TLanguage;

class LanguageController extends Controller
{
	public function actionInsert(Request $request)
	{
		$tLanguage=new TLanguage();

		$tLanguage->idLanguage=uniqid();
		$tLanguage->name=trim($request->input('name'));

		$tLanguage->save();

		$this->_so->mo->success();
		$this->_so->mo->message='Operación realizada correctamente.';

		return response()->json($this->_so);
	}
}
?>
