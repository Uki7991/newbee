<?php
namespace app\validators;

use src\core\Validator;

class TaskStoreValidator extends Validator
{
    public function rules()
    {
        return [
            'title' => [
                'required',
            ],
            'username' => [
                'required', 'nonspace',
            ],
            'email' => [
                'required', 'email',
            ]
        ];
    }
}