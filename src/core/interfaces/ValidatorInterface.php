<?php
namespace src\core\interfaces;

interface ValidatorInterface
{
    /**
     * @return array
     */
    public function rules();

    /**
     * @param array $inputs
     * @return mixed
     */
    public function validate($inputs);
}