<?php

namespace App\Validator\Handlers;


interface ValidateInterface
{
    /**
     * @param string $field
     * @param array $request
     * @param $additional
     * @return bool|array
     */
    public function __invoke(string $field, array $request, $additional = null);
}