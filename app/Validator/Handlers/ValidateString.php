<?php

namespace App\Validator\Handlers;


class ValidateString implements ValidateInterface
{

    /**
     * @param string $field
     * @param array $request
     * @param $additional
     * @return mixed
     */
    public function __invoke(string $field, array $request, $additional = null)
    {
        if (!array_key_exists($field, $request)) {
            return true;
        }

        if (is_string($request[$field])) {
            return true;
        }

        return 'Поле ' . $field . ' должно быть строкой';
    }
}