<?php

declare(strict_types = 1);

namespace Nova\Specification;

/**
 * $spec = new AndSpecification(
 *      new CustomerIsPremium($orderRepository),
 *      new CustomerHasOverdueInvoices($invoiceRepository)
 * );
 * $spec->isSatisfiedBy($customer); // true/false
 */
class AndSpecification extends AbstractSpecification
{
    /** @var SpecificationInterface[] */
    private $specifications;

    /**
     * @param SpecificationInterface[] ...$specifications
     */
    public function __construct(SpecificationInterface ...$specifications)
    {
        $this->specifications = $specifications;
    }

    /**
     * @inheritdoc
     */
    public function isSatisfiedBy($object): bool
    {
        $result = true;

        foreach ($this->specifications as $specification) {
            if (!$specification->isSatisfiedBy($object)) {
                $this->addMessages($specification->getMessages());
                $result = false;
            }
        }

        return $result;
    }
}
