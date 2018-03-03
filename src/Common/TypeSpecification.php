<?php

declare(strict_types = 1);

namespace Nova\Specification\Common;

use Nova\Specification\AbstractSpecification;

class TypeSpecification extends AbstractSpecification
{
    /** @var string */
    private $type;

    public function __construct(string $type)
    {
        $this->type = $type;
    }

    public function isSatisfiedBy($value): bool
    {
        if (getType($value) === $this->type) {
            return true;
        }

        return false;
    }
}
