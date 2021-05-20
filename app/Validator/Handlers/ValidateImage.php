<?php

namespace App\Validator\Handlers;


class ValidateImage implements ValidateInterface
{

    /**
     * @param string $field
     * @param array $request
     * @param $additional
     * @return mixed
     */
    public function __invoke(string $field, array $request, $additional = null)
    {
        if (!array_key_exists($field, $request) || !is_array($request[$field]) || empty($request['tmp_name'])) {
            return true;
        }

        if (in_array($request[$field]['type'], ['image/jpeg', 'image/png', 'image/gif'])) {
            return true;
        }

        return 'Поле ' . $field . ' должно быть типа image';
    }
}