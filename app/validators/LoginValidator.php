<?php


namespace app\validators;


use src\core\Validator;

class LoginValidator extends Validator
{

    public function rules()
    {
        return [
            'name' => [
                'required', 'nonspace',
            ],
            'password' => [
                'required',
            ],
        ];
    }
}