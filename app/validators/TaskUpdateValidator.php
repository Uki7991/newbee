<?php


namespace app\validators;


use src\core\Validator;

class TaskUpdateValidator extends Validator
{
    public function rules()
    {
        return [
            'title' => [
                'required',
            ],
            'email' => [
                'required', 'email',
            ],
            'username' => [
                'required', 'nonspace',
            ]
        ];
    }
}