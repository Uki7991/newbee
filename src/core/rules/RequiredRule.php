<?php
namespace src\core\rules;

use src\core\interfaces\RuleInterface;

class RequiredRule extends Rule implements RuleInterface
{
    protected $type = 'required';

    /**
     * @param $attribute
     * @param $value
     * @return mixed
     */
    public function check($attribute, $value)
    {
        $this->attribute = $attribute;
        if (is_null($value) || $value === '') {
            return false;
        }

        return true;
    }
}