<?php

declare(strict_types = 1);

namespace Nova\Specification\Common;

use Nova\Specification\AbstractSpecification;

class EqualSpecification extends AbstractSpecification
{
    /** @var mixed */
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function isSatisfiedBy($value): bool
    {
        if ($value === $this->value) {
            return true;
        }

        return false;
    }
}
