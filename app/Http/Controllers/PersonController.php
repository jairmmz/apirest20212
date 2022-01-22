<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;

use DB;
use App\Models\TPerson;
use App\Models\TFavoriteLanguage;

use App\Validation\PersonValidation;
use Symfony\Component\Console\Input\Input;

class PersonController extends Controller
{
    public function actionInsert(Request $request)
	{
		try
		{
			DB::beginTransaction();

			/*Programar todo el flujo*/
			$tPerson = new TPerson();
			$tPerson->idPerson=uniqid();
			$tPerson->firstName=trim($request->input('firstName'));
			$tPerson->surName=trim($request->input('surName'));
			$tPerson->birthDate=trim($request->input('birthDate'));
			$tPerson->gender=trim($request->input('gender'));
			$tPerson->height=trim($request->input('height'));

			$tPerson->save();

			$tFavoriteLanguage = new TFavoriteLanguage();
			$tFavoriteLanguage->idFavoriteLanguage=uniqid();
			$tFavoriteLanguage->idPerson=$tPerson->idPerson;
			$tFavoriteLanguage->idLanguage=trim($request->input('idLanguage'));

			$tFavoriteLanguage->save();

			DB::commit();

			$this->_so->mo->listMessage[]='Operación realizada correctamente.';
			$this->_so->mo->success();

			return response()->json($this->_so);
		}
		catch(\Exception $e)
		{
			DB::rollback();

			$this->_so->mo->listMessage[]='Ocurrió un error inesperado, por favor, contáctese con el administrador del sistema.';
			$this->_so->mo->exception();

			return response()->json($this->_so);
		}
	}

	public function actionEdit(Request $request)
	{
		try {
			DB::beginTransaction();

			$tPerson = TPerson::find($request->input('idPerson'));

			if($tPerson == null){
				$this->_so->mo->listMessage[]='El registro que se trata de modificar, no fue encontrado.';
				return response()->json($this->_so);
			}

			// Aqui poner la condicion para el PersonValidation.

			if($this->_so->mo->existsMessage())
			{
				return response()->json($this->_so);
			}

			$tPerson->firstName=trim($request->input('firstName'));
			$tPerson->save();

			// Modificación de la tabla TFavoriteLanguage
			$tFavoriteLanguage = TFavoriteLanguage::find($request->input('idFavoriteLanguage'));

			// Aqui poner la condicion para el PersonValidation

			if ($tFavoriteLanguage == null) {
				$this->_so->mo->listMessage[]='El registro que se trata de modificar, no fue encontrado.';
				return response()->json($this->_so);
			}

			$tFavoriteLanguage->idLanguage=trim($request->input('idLanguage'));
			$tFavoriteLanguage->save();

			DB::commit();

			$this->_so->mo->listMessage[]='Operación realizada correctamente.';
			$this->_so->mo->success();

			return response()->json($this->_so);
		} catch (\Throwable $th) {
			DB::rollback();

			$this->_so->mo->listMessage[]='Ocurrió un error inesperado.';
			$this->_so->mo->exception();

			return response()->json($this->_so);	
		}
	}

	public function actionDelete(Request $request)
	{
		try {
			DB::beginTransaction();
			$tPerson = TPerson::find($request->input('idPerson'));

			if ($tPerson != null) {
				$tPerson->delete();
			}

			DB::commit();

			$this->_so->mo->listMessage[]='Registro eliminado correctamente.';
			$this->_so->mo->success();
			
			return response()->json($this->_so);

		} catch (\Throwable $th) {
			DB::rollback();
			$this->_so->mo->listMessage[]='Ocurrió un error inesperado.';
			$this->_so->mo->exception();

			return response()->json($this->_so);
		}
	}

	public function actionShowPerson()
	{
		try {
			DB::beginTransaction();

			$tShowPerson = TPerson::with('surName')->get();
			//$tShowPerson = TPerson::all();

			DB::commit();

			$this->_so->dto->tShowPerson = $tShowPerson;
			$this->_so->mo->success();

			return response()->json($this->_so);

		} catch (\Throwable $th) {
			throw $th;
			// DB::rollback();
			// $this->_so->mo->listMessage[]='Ocurrió un error inesperado.';
			// $this->_so->mo->exception();

			// return response()->json($this->_so);
		}
	}

}
?>