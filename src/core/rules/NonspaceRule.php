<?php


namespace src\core\rules;


use src\core\interfaces\RuleInterface;

class NonspaceRule extends Rule implements RuleInterface
{
    protected $type = 'nonspace';
    /**
     * @inheritDoc
     */
    public function check($attribute, $value)
    {
        $this->attribute = $attribute;
        if (preg_match('/\s/', $value)) {
            return false;
        }

        return true;
    }
}