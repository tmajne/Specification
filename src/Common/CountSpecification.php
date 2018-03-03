<?php

declare(strict_types = 1);

namespace Nova\Specification\Common;

use Nova\Specification\AbstractSpecification;

class CountSpecification extends AbstractSpecification
{
    /** @var int */
    private $count;

    public function __construct(int $count)
    {
        $this->count = $count;
    }

    public function isSatisfiedBy($data): bool
    {
        if (count($data) === $this->count) {
            return true;
        }

        return false;
    }
}
