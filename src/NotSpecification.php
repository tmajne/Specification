<?php

declare(strict_types = 1);

namespace Nova\Specification;

/**
 * $spec = new NotSpecification(
 *      new CustomerIsPremium($orderRepository)
 * );
 * $spec->isSatisfiedBy($customer); // true/false
 *
 * $spec1 = new CustomerIsPremium($orderRepository);
 * $spec2 = $spec->not()
 * $spec2->isSatisfiedBy($customer); // true/false
 */
class NotSpecification extends AbstractSpecification
{
    /** @var SpecificationInterface  */
    private $specification;

    /**
     * Not constructor.
     *
     * @param SpecificationInterface $specification
     */
    public function __construct(SpecificationInterface $specification)
    {
        $this->specification = $specification;
    }

    /**
     * @inheritdoc
     */
    public function isSatisfiedBy($object): bool
    {
        $result = !$this->specification->isSatisfiedBy($object);

        if (!$result) {
            $this->addMessages($this->specification->getMessages());
        }

        return $result;
    }
}
