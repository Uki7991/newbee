<?php
namespace src\core\interfaces;

interface RuleInterface
{
    /**
     * @param $attribute
     * @param $value
     * @return string
     */
    public function check($attribute, $value);

    /**
     * @return string
     */
    public function message();
}