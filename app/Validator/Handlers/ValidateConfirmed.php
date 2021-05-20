<?php

namespace App\Validator\Handlers;


class ValidateConfirmed implements ValidateInterface
{

    /**
     * @param string $field
     * @param array  $request
     * @param        $additional
     * @return bool|array
     */
    public function __invoke(string $field, array $request, $additional = null)
    {
        if (array_key_exists($field, $request) && array_key_exists($field . '_confirmed', $request) && $request[$field] === $request[$field . '_confirmed']) {
            return true;
        }

        return 'Поле ' . $field . ' должно быть подтверждено';
    }
}