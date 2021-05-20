<?php

namespace App\Validator\Handlers;



class ValidateRequired implements ValidateInterface
{

    /**
     * @param string $field
     * @param array $request
     * @param $additional
     * @return mixed
     */
    public function __invoke(string $field, array $request, $additional = null)
    {
        if (array_key_exists($field, $request) && !empty($request[$field])) {
            return true;
        }

        return 'Поле ' . $field . ' обязательно для заполнения';
    }
}