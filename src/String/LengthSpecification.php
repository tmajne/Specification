<?php

declare(strict_types = 1);

namespace Nova\Specification\String;

use Nova\Specification\AbstractSpecification;

class LengthSpecification extends AbstractSpecification
{
    /** @var int */
    private $min;

    /** @var int */
    private $max;

    public function __construct(?int $min, ?int $max = null)
    {
        $this->min = $min;
        $this->max = $max;
    }

    public function isSatisfiedBy($string): bool
    {
        if (is_string($string)
            && (null === $this->min || strlen($string) >= $this->min)
            && (null === $this->max || strlen($string) <= $this->max)
        ) {
            return true;
        }

        return false;
    }
}
