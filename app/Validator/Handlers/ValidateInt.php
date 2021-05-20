<?php

namespace App\Validator\Handlers;


class ValidateInt implements ValidateInterface
{

    /**
     * @param string $field
     * @param array  $request
     * @param        $additional
     * @return bool|array
     */
    public function __invoke(string $field, array $request, $additional = null)
    {
        if (!array_key_exists($field, $request)) {
            return true;
        }

        if (is_int($request[$field])) {
            return true;
        }

        return 'Поле ' . $field . ' должно быть целым числом';
    }
}