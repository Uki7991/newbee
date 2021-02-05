<?php


namespace app\validators;


use src\core\Validator;

class LoginValidator extends Validator
{

    public function rules()
    {
        return [
            'email' => [
                'required', 'email',
            ],
            'password' => [
                'required',
            ],
        ];
    }
}