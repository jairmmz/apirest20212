<?php
namespace App\Validation;

use App\Models\TFavoriteLanguage;
use App\Models\TPerson;
use Validator;


class PersonValidation
{
    private $globalMessage=[];

    public function validationInsert($request)
    {
        $validator=Validator::make(
        [
            'firstName' => trim($request->input('firstName')),
            'surName' => trim($request->input('surName')),
            'birthDate' => trim($request->input('birthDate')),
            'gender' => trim($request->input('gender')),
            'height' => trim($request->input('height')),
            'idLanguage' => trim($request->input('idLanguage'))
        ],
        [
            'firstName' => ['required'],
            'surName' => ['required'],
            'birthDate' => ['required'],
            'gender' => ['required'],
            'height' => ['required'],
            'idLanguage' => ['required']

        ],
        [
            'firstName.required' => 'El campo "firstName" es requerido.',
            'surName.required' => 'El campo "surName" es requerido.',
            'birthDate.required' => 'El campo "birthDate" es requerido.',
            'gender.required' => 'El campo "gender" es requerido.',
            'height.required' => 'El campo "height" es requerido.',
            'idLanguage.required' => 'El campo "idLanguage" es requerido.'
        ]);

        if($validator->fails())
        {
            $errors=$validator->errors()->all();

            foreach($errors as $value)
            {
                $this->globalMessage[]=$value;
            }
        }

        if(TPerson::whereRaw("firstName=? and surName=?",[$request->input('firstName'),$request->input('surName')])->first()!=null){
            if(TFavoriteLanguage::whereRaw("idLanguage=?",[$request->input('idLanguage')])->first()!=null){
                $this->globalMessage[]='El lenguaje favorito ingresado de la persona, ya existe.';
            }
        }

        // if(TPerson::join('TFavoriteLanguage','tfavoritelanguage','tperson.idPerson','=','tfavoritelanguage.idPerson')->join('tlanguage','tlanguage.idLanguage','=','tfavoritelanguage.idLanguage')->select('tperson.idPerson','tlanguage.idLanguage')->where('tperson.idPerson',$request->input('idPerson','tlanguage.idLanguage',$request->input('idLanguage')))->get() != null){

        // }

        return $this->globalMessage;
    }

    public function validationEdit($request)
    {
        $validator=Validator::make(
        [
            'idPerson' => trim($request->input('idPerson')),
            'firstName' => trim($request->input('firstName')),
            'idFavoriteLanguage' => trim($request->input('idFavoriteLanguage')),
            'idLanguage' => trim($request->input('idLanguage')),
            
        ],
        [
            'idPerson' => ['required'],
            'firstName' => ['required'],
            'idFavoriteLanguage' => ['required'],
            'idLanguage' => ['required']
        ],
        [
            'idPerson.required' => 'El campo "idPerson" es requerido.',
            'firstName.required' => 'El campo "firstName" es requerido.',
            'idFavoriteLanguage.required' => 'El campo "idFavoriteLanguage" es requerido.',
            'idLanguage.required' => 'El campo "idLanguage" es requerido.'
        ]);

        if($validator->fails())
        {
            $errors=$validator->errors()->all();

            foreach($errors as $value)
            {
                $this->globalMessage[]=$value;
            }
        }

        if(TFavoriteLanguage::whereRaw("idFavoriteLanguage!=? and (idPerson=? and idLanguage=?)",[$request->input('idFavoriteLanguage'), $request->input('idPerson'),$request->input('idLanguage')])->first()!=null){
            $this->globalMessage[]='El lenguaje ingresado a actualizar de la persona, ya existe.';
        }
        

        return $this->globalMessage;
    }


}
?>