<?php

declare(strict_types = 1);

namespace Nova\Specification\Common;

use Nova\Specification\AbstractSpecification;

class EmailSpecification extends AbstractSpecification
{
    public function isSatisfiedBy($email): bool
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }

        return false;
    }
}
