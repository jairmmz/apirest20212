<?php
namespace App\Validation;

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
            'height' => trim($request->input('height'))
        ],
        [
            'firstName' => ['require'],
            'surName' => ['require'],
            'birthDate' => ['require'],
            'gender' => ['require'],
            'height' => ['require'],

        ],
        [
            'firstName.unique' => 'El campo "firstName" es requerido.',
            'surName.unique' => 'El campo "surName" es requerido.',
            'birthDate.unique' => 'El campo "birthDate" es requerido.',
            'gender.unique' => 'El campo "gender" es requerido.',
            'height.unique' => 'El campo "height" es requerido.'
        ]);

        if($validator->fails())
        {
            $errors=$validator->errors()->all();

            foreach($errors as $value)
            {
                $this->globalMessage[]=$value;
            }
        }

        return $this->globalMessage;
    }

    public function validationEdit($request)
    {
        $validator=Validator::make(
        [
            'email' => trim($request->input('txtEmail'))
        ],
        [
            'email' => ['unique:tuser,email']
        ],
        [
            'email.unique' => 'El campo "" es requerido.'
        ]);

        if($validator->fails())
        {
            $errors=$validator->errors()->all();

            foreach($errors as $value)
            {
                $this->globalMessage[]=$value;
            }
        }

        return $this->globalMessage;
    }


}
?>