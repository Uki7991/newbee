<?php
namespace app\validators;

use src\core\Validator;

class RegisterValidator extends Validator
{
    /**
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
            ],
            'email' => [
                'required', 'email'
            ],
            'password' => [
                'required', 'confirmed',
            ],
        ];
    }
}