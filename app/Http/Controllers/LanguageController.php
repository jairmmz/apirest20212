<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Validation\LanguageValidation;

use App\Models\TLanguage;

class LanguageController extends Controller
{
	public function actionInsert(Request $request)
	{
		try
		{
			$this->_so->mo->listMessage=(new LanguageValidation())->validationInsert($request);

			if($this->_so->mo->existsMessage())
			{
				return response()->json($this->_so);
			}

			$tLanguage=new TLanguage();

			$tLanguage->idLanguage=uniqid();
			$tLanguage->name=trim($request->input('name'));

			$tLanguage->save();

			$this->_so->mo->listMessage[]='Operación realizada correctamente.';
			$this->_so->mo->success();

			return response()->json($this->_so);
		}
		catch(\Exception $e)
		{
			$this->_so->mo->listMessage[]='Ocurrió un error inesperado, por favor, contáctese con el administrador del sistema.';
			$this->_so->mo->exception();

			return response()->json($this->_so);
		}
	}
}
?>

