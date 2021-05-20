<?php

namespace App\Validator;


use Pecee\Http\Input\InputHandler;

class Validator
{
    public const STATUS_VALIDATED = 'VALIDATED';
    public const STATUS_ERROR     = 'ERROR';

    private string $status = self::STATUS_VALIDATED;
    private array  $fields = [];

    /**
     * @param array        $rules
     * @param InputHandler $request
     */
    public static function run(array $rules, InputHandler $request): void
    {
        $validator = new static();

        foreach ($rules as $fieldName => $ruleString) {
            if (!empty($check = $validator->checkRule($fieldName, $ruleString, $request))) {
                $validator->status             = self::STATUS_ERROR;
                $validator->fields[$fieldName] = $check;
            }
        }

        if (self::STATUS_ERROR === $validator->status) {
            throw new ValidateException('Валидация не пройдена', 0, null, $validator->fields);
        }
    }

    /**
     * @param string       $fieldName
     * @param string       $ruleString
     * @param InputHandler $request
     * @return array
     */
    private function checkRule(string $fieldName, string $ruleString, InputHandler $request): string
    {
        $rules  = explode('|', $ruleString);
        $result = [];

        foreach ($rules as $rule) {
            $additional = null;
            if (strpos($rule, ':')) {
                [$rule, $additional] = explode(':', $rule);
            }

            $classPath = '\App\Validator\Handlers\Validate' . $rule;

            if (!class_exists($classPath)) {
                throw new \RuntimeException('Класс валидации не найден! ' . $classPath);
            }

            if (true !== $status = (new $classPath)($fieldName, $request->all(), $additional)) {
                $result[] = $status;
            }
        }

        return implode(' | ', $result);
    }
}