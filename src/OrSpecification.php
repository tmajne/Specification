<?php

declare(strict_types = 1);

namespace Nova\Specification;

/**
 * $spec = new OrSpecification(
 *      new CustomerIsPremium($orderRepository),
 *      new CustomerHasOverdueInvoices($invoiceRepository)
 * );
 * $spec->isSatisfiedBy($customer); // true/false
 */
class OrSpecification extends AbstractSpecification
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
        $result = false;

        foreach ($this->specifications as $specification) {
            if ($specification->isSatisfiedBy($object)) {
                $result = true;
            } else {
                $this->addMessages($specification->getMessages());
            }
        }

        //if ($result) {
        //    $this->clearMessages();
        //}

        return $result;
    }
}
