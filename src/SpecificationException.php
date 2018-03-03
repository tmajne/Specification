<?php

declare(strict_types = 1);

namespace Nova\Specification;

use Exception;
use Throwable;

class SpecificationException extends Exception
{
    private $errors = [];

    public function __construct($errors, $code = 0, Throwable $previous = null)
    {
        parent::__construct('Validation exception', $code, $previous);
        $this->errors = is_array($errors) ? $errors : [$errors];
    }

    /**
     * @return array
     */
    public function getValidationErrors(): array
    {
        return $this->errors;
    }
}
