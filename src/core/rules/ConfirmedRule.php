<?php
namespace src\core\rules;

use src\core\interfaces\RuleInterface;

class ConfirmedRule extends Rule implements RuleInterface
{
    protected $type = 'confirmed';

    public function check($attribute, $value)
    {
        $this->attribute = $attribute;
        return $this->inputs[$attribute.'_confirmation'] === $value;
    }
}