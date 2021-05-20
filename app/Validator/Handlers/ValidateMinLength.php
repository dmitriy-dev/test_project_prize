<?php

namespace App\Validator\Handlers;



class ValidateMinLength implements ValidateInterface
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

        if (is_string($request[$field]) && strlen($request[$field]) >= $additional) {
            return true;
        }

        return 'Поле ' . $field . ' должно иметь длину не более ' . $additional;
    }
}