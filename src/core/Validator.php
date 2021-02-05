<?php
namespace src\core;

use src\core\interfaces\RuleInterface;
use src\core\interfaces\ValidatorInterface;

class Validator implements ValidatorInterface
{
    private $errors = [];
    private $inputs;

    public function rules()
    {
        // TODO: Implement rules() method.
    }

    public function validate($inputs)
    {
        $ruleArray = $this->rules();
        $this->inputs = $inputs;

        foreach ($inputs as $key => $input) {
            if (isset($ruleArray[$key])) {
                foreach ($ruleArray[$key] as $rule) {
                    $rule = 'src\core\rules\\'.ucfirst($rule).'Rule';
                    /**
                     * @var RuleInterface $rule
                     */
                    $rule = new $rule($inputs);
                    if (!$rule->check($key, $input)) {
                        $this->errors[$key] = $rule->message();
                    }
                }
            }
        }

        $session = Session::getInstance();
        if (!empty($this->errors)) {
            $session->flash('errors', $this->errors);
            $session->flash('old', $this->inputs);
        } else {
            $session->forget('errors');
        }

        return $this->errors;
    }
}