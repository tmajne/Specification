<?php

declare(strict_types = 1);

namespace Nova\Specification;

abstract class AbstractSpecification implements SpecificationInterface
{
    /** @var array */
    protected $messages = [];

    /** @var array */
    protected $errorMessage = [];

    /**
     * @inheritdoc
     */
    public function setErrorMessage(string $message, $key = null): SpecificationInterface
    {
        if ($key) {
            $this->errorMessage[$key][] = $message;
        } else {
            $this->errorMessage[] = $message;
        }

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getMessages(): array
    {
        if (count($this->errorMessage)) {
            return $this->errorMessage;
        }

        return $this->messages;
    }

    /**
     * @inheritdoc
     */
    public function and(SpecificationInterface ...$specifications): SpecificationInterface
    {
        return new AndSpecification($this, ...$specifications);
    }

    /**
     * @inheritdoc
     */
    public function or(SpecificationInterface ...$specifications): SpecificationInterface
    {
        return new OrSpecification($this, ...$specifications);
    }

    /**
     * @inheritdoc
     */
    public function not(): SpecificationInterface
    {
        return new NotSpecification($this);
    }

    /**
     * @param string $message
     * @param null   $key
     */
    protected function addMessage(string $message, $key = null): void
    {
        if ($key) {
            $this->messages[$key][] = $message;
        } else {
            $this->messages[] = $message;
        }
    }

    /**
     * @param string[] $messages
     */
    protected function addMessages(array $messages): void
    {
        foreach ($messages as $key => $msgValue) {
            if (is_int($key)) {
                $this->addMessage($msgValue);
            } else {
                foreach ($msgValue as $singleMessage) {
                    $this->addMessage($singleMessage, $key);
                }
            }
        }
    }

    protected function clearMessages(): void
    {
        $this->messages = [];
    }
}
