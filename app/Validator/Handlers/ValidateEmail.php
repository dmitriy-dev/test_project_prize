<?php

namespace App\Validator\Handlers;


class ValidateEmail implements ValidateInterface
{

    /**
     * @param string $field
     * @param array $request
     * @param $additional
     * @return bool|array
     */
    public function __invoke(string $field, array $request, $additional = null)
    {
        if (!array_key_exists($field, $request)) {
            return true;
        }

        if (filter_var($request[$field], FILTER_VALIDATE_EMAIL)) {
            return true;
        }

        return 'Не верный тип поля ' . $field;
    }
}