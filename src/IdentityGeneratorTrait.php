<?php

declare(strict_types=1);

namespace Adapik\IdGenerator;

use RuntimeException;

/**
 * Trait IdentityGeneratorTrait
 */
trait IdentityGeneratorTrait
{
    /**
     * @var IdentityGeneratorInterface
     */
    private $generator;

    /**
     * @param IdentityGeneratorInterface $generator
     */
    public function setGenerator(IdentityGeneratorInterface $generator)
    {
        $this->generator = $generator;
    }

    public function nextIdentity()
    {
        if ($this->generator === null) {
            throw new RuntimeException('Generator must be configured by method setGenerator call');
        }

        $this->generator->nextIdentity();
    }
}
