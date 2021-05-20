<?php


namespace App\Validator;


use Throwable;

class ValidateException extends \InvalidArgumentException
{
    protected array $fields = [];

    public function __construct($message = "", $code = 0, Throwable $previous = null, array $fields = [])
    {
        parent::__construct($message, $code, $previous);
        $this->fields = $fields;
    }

    public function addField(string $fieldName, string $value): void
    {
        $this->fields[] = [
            $fieldName => $value
        ];
    }

    public function getFields(): array
    {
        return $this->fields;
    }
}