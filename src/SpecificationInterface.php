<?php

namespace Nova\Specification;

interface SpecificationInterface
{
    /**
     * @param $object
     *
     * @return bool
     */
    public function isSatisfiedBy($object): bool;

    /**
     * @param string $message
     *
     * @return SpecificationInterface
     */
    public function setErrorMessage(string $message): SpecificationInterface;

    /**
     * @return string[]
     */
    public function getMessages(): array;


    /**
     * @param SpecificationInterface[] ...$specifications
     *
     * @return SpecificationInterface
     */
    public function and(SpecificationInterface ...$specifications): SpecificationInterface;

    /**
     * @param SpecificationInterface[] ...$specifications
     *
     * @return SpecificationInterface
     */
    public function or(SpecificationInterface ...$specifications): SpecificationInterface;

    /**
     * @return SpecificationInterface
     */
    public function not(): SpecificationInterface;
}
