<?php
namespace src\core\rules;

use src\core\interfaces\RuleInterface;

class EmailRule extends Rule implements RuleInterface
{
    protected $type = 'email';

    public function check($attribute, $value)
    {
        $this->attribute = $attribute;
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}