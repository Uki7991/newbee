<?php
namespace src\core\rules;

abstract class Rule
{
    protected $messages;
    protected $inputs;
    protected $attribute;
    protected $type;

    public function __construct($inputs)
    {
        $this->inputs = $inputs;
        $this->messages = require __ROOT__.'/src/messages/validation.php';
    }

    public function message()
    {
        return preg_replace('#:[a-z]+#', $this->attribute, $this->messages[$this->type]);
    }
}