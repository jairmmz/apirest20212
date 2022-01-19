<?php
namespace App\Validation;

use Validator;

use App\Models\TLanguage;

class LanguageValidation
{
	private $globalMessage=[];

	public function validationInsert($request)
	{
		$validator=Validator::make(
		[
			'name' => trim($request->input('name'))
		],
		[
			'name' => ['required']
		],
		[
			'name.required' => 'El campo "Nombre" es requerido.'
		]);

		if($validator->fails())
		{
			$errors=$validator->errors()->all();

			foreach($errors as $value)
			{
				$this->globalMessage[]=$value;
			}
		}

		if(TLanguage::whereRaw("replace(name, ' ', '')=replace(?, ' ', '')", [$request->input('name')])->first()!=null)
		{
			$this->globalMessage[]='El nombre ingresado para el lenguaje de programación, ya existe.';
		}

		return $this->globalMessage;
	}

	public function validationUpdate($request)
	{
		$validator=Validator::make(
			[
				'name' => trim($request->input('name'))
			],
			[
				'name' => ['required']
			],
			[
				'name.required' => 'El campo "Nombre" es requerido.'
			]);
	
			if($validator->fails())
			{
				$errors=$validator->errors()->all();
	
				foreach($errors as $value)
				{
					$this->globalMessage[]=$value;
				}
			}
	
			if(TLanguage::whereRaw("idLanguage!=? and replace(name, ' ', '')=replace(?, ' ', '')", [$request->input('idLanguage'), $request->input('name')])->first()!=null)
			{
				$this->globalMessage[]='El nombre ingresado para el lenguaje de programación, ya existe.';
			}
	
			return $this->globalMessage;
	
	}
}
?>
