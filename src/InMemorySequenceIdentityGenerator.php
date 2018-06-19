<?php

declare(strict_types=1);

namespace Adapik\IdGenerator;

/**
 * Basic sequence generator based on in-memory implementation
 */
class InMemorySequenceIdentityGenerator implements IdentityGeneratorInterface
{
    /**
     * Current value
     *
     * @var int
     */
    private $current = 1;

    /**
     * Generates next identifier
     *
     * @return int
     */
    public function nextIdentity(): int
    {
        return $this->current++;
    }
}
