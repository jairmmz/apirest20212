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

	public function actionDelete($idLanguage){

		try {
			$tLanguage = TLanguage::find($idLanguage);

			if ($tLanguage != null) {
				$tLanguage->delete();
			}

			$this->_so->mo->listMessage[]='Registro eliminado correctamente.';
			$this->_so->mo->success();
			
			return response()->json($this->_so);

		} catch (\Throwable $th) {
			$this->_so->mo->listMessage[]='Ocurrió un error inesperado.';
			$this->_so->mo->exception();

			return response()->json($this->_so);
		}

	}

	public function actionUpdate(Request $request)
	{
		try
		{
			$tLanguage=TLanguage::find($request->input('idLanguage'));

			if($tLanguage==null)
			{
				$this->_so->mo->listMessage[]='El registro que se trata de modificar, no fue encontrado.';

				return response()->json($this->_so);
			}

			$this->_so->mo->listMessage=(new LanguageValidation())->validationUpdate($request);

			if($this->_so->mo->existsMessage())
			{
				return response()->json($this->_so);
			}

			$tLanguage->name=trim($request->input('name'));

			$tLanguage->save();

			$this->_so->mo->listMessage[]='Operación realizada correctamente.';
			$this->_so->mo->success();

			return response()->json($this->_so);
		}
		catch(\Exception $e)
		{
			throw $e;
			// $this->_so->mo->listMessage[]='Ocurrió un error inesperado, por favor, contáctese con el administrador del sistema.';
			// $this->_so->mo->exception();
			// return response()->json($this->_so);
		}

	}

	public function actionShowLanguage()
	{
		try {

			$listLanguage = TLanguage::all();
			$this->_so->dto->listLanguage = $listLanguage;
			$this->_so->mo->success();

			return response()->json($this->_so);

		} catch (\Throwable $th) {
			$this->_so->mo->listMessage[]='Ocurrió un error inesperado.';
			$this->_so->mo->exception();

			return response()->json($this->_so);
		}
	}
}
?>

